
class Tile {
 

 static async add(actionParameters, trigger) {  // Add a tile, possibly as a child of an existing tile

  // Parse action parameters to get the tile name
  const parametersArray = actionParameters.split(', ');
  const tileName = parametersArray[0].replace(/'/g, "");

  // Attempt to find a parent tile and use its ID as parentId
  const parentTile = trigger.closest('.tile');
  const parentId = parentTile ? parentTile.id : null;

  // Get the tile path
  const tilePath = tileNameToPathService(tileName);

  // Fetch the content for the tile
  const response = await fetch(tilePath);
  const content = await response.text();

  // Get the tile container and create a new tile
  const container = document.getElementById("tileContainer");
  const tile = document.createElement('div');
  const tileId = TileId.create(tileName, parentId);
  
  // Set up the new tile's properties
  tile.id = tileId;
  tile.className = 'tile fill styleOff';
  tile.innerHTML = content;

  // Append the new tile to the container
  container.appendChild(tile);

  // Get Lenis parameters for smooth scrolling
  const queryLenisContainer = `#${tileId} .tileContent`;
  const queryScrollContent = `#${tileId} .scrollContent`;
  const lenisContainer = document.querySelector(queryLenisContainer);
  const tileContent = document.querySelector(queryScrollContent);

  // Get the tile head to observe for pinning
  const queryTileHead = `#${tileId} .tileHead`;
  const tileHead = document.querySelector(queryTileHead);

  observeHead(tileHead); // If using IntersectionObserver to toggle "is-pinned" class
  initLenis(lenisContainer, tileContent); // If Lenis is used for smooth scrolling

  // Update actions for tile removal and modification
  updateDataAction.mod(tile, 'Tile.remove', tileId, ',');
  updateDataAction.mod(tile, 'Tile.mod', tileId, ',');

  // Re-initialize the trigger service for the new tile
  triggerService();

  // Animate the appearance of the new tile
  setTimeout(() => {
    tile.classList.remove("styleOff");
    tile.classList.add("styleOn");
    
  }, 25);



}

static async remove(actionParameters, trigger) {

  // Extrae el ID de la tile de los parámetros de acción
  const parametersArray = actionParameters.split(', ');
  const tileId = parametersArray[0].replace(/'/g, "");

  // Encuentra el elemento de la tile por ID
  const tile = document.getElementById(tileId);

  // Verifica si la tile existe antes de proceder
  if (!tile) {
    console.error(`Tile with ID ${tileId} does not exist and cannot be removed.`);
    return; // Sal si la tile no existe
  }

  // Obtiene los IDs de las tiles hijas y las elimina recursivamente
  const children = TileId.getChildren(tileId); // Obtiene los IDs de las tiles hijas
  children.forEach(childId => {
    // Elimina cada tile hija llamando a Tile.remove recursivamente
    Tile.remove(`'${childId}'`, null);
  });

  // Elimina la clase 'styleOn' para activar cualquier animación de CSS para la eliminación de la tile
  
  tile.classList.add("styleOff");
  
  // Espera a que se complete la animación de CSS antes de eliminar la tile del DOM
  setTimeout(() => {

    const forceReflow = tile.offsetHeight;

    tile.remove(); // Elimina el elemento de la tile del DOM
    
    TileId.remove(tileId); // Limpia los mapeos de TileId para la tile eliminada
    
    triggerService(); // Re-inicializa los listeners de los triggers después de eliminar la tile

    

  }, 600); // Ajusta este tiempo para que coincida con la duración de tu animación CSS

  if (trigger) {
    trigger.classList.remove('is-active'); // Asegura que el trigger se desactive
  }

}

   static async mod(actionParameters, trigger) {    // Method to modificate a tile
    //Split action parameters into parametersArray
    const parametersArray = actionParameters.split(', ');

    //Get and process tileName
    const tileName = parametersArray[0].replace(/'/g, "");

    const tile = document.getElementById(tileName);
    
    setTimeout(() => {
      
      tile.classList.add("styleAlt");
    }, 100);
  }

  static async clean(actionParameters, trigger) {   // Method to remove all tiles & cleanIds
    
    // Get all current tile IDs
    const currentTileIds = TileId.getCurrent();

    currentTileIds.forEach(TileIds => {

      lenis.destroy(TileIds);
      Tile.remove(TileIds);
      // Destroy all Lenis Smooth Scroll Instances
      
    
    })
    TileId.reset();
    // Reset TileId counters and activeIds
    
    
  }
  

}


function tileNameToPathService(tileName) {

  let tilePath;

  switch (tileName) {

    case 'indexTile':
      tilePath = 'components/ui/indexTile.php';
      break;

    case 'blogTile':
      tilePath = 'components/ui/blogTile.php';
      break;

    case 'blogTileChild':
        tilePath = 'components/ui/blogTileChild.php';
        break;
  
    case 'blankTile4':
      tilePath = 'components/ui/blankTile.php';

      break;

    case 'portfolioTile':
      tilePath = 'components/ui/portfolioTile.php';

      break;

    default:
      console.log('Error en el nombre del Tile');


  }
  return tilePath;

}

class TileId {
  static counter = 0;
  static activeIds = [];
  static relationships = new Map();

  static create(tileName, parentId = null) {
    TileId.counter += 1;
    const newId = `${tileName}${TileId.counter}`;
    TileId.activeIds.push(newId);
    
    // If a parentId is provided, establish a parent-child relationship
    if (parentId) {
      TileId.relationships.set(newId, parentId);
    }

    return newId;
  }

  static remove(tileId) {
    // Directly remove the tile ID from the activeIds array
    const index = TileId.activeIds.indexOf(tileId);
    if (index > -1) {
      TileId.activeIds.splice(index, 1);
    }

    // Recursively remove any children of the tile
    const childrenToRemove = TileId.getChildren(tileId);
    childrenToRemove.forEach(childId => {
      TileId.remove(childId); // Recursive call to remove each child
    });

    // After all children have been handled, delete the parent
    TileId.relationships.delete(tileId);
  }
 
  static getCurrent() {
    return [...TileId.activeIds];
  }

  static reset() {
    TileId.counter = 0;
    TileId.activeIds = [];
    TileId.relationships.clear();
  }
  
  static getParent(tileId) {
    // Return the parent of the given tileId
    return TileId.relationships.get(tileId);
  }

  static getChildren(parentId) {
    // Find and return all children for the given parentId
    const children = [];
    for (const [childId, parent] of TileId.relationships.entries()) {
      if (parent === parentId) {
        children.push(childId);
      }
    }
    return children;
  }
}

Hola

