function triggerService() { //Get & listen trigger elements
  // Selects all trigger elements without Listeners
  const triggers = document.querySelectorAll('.trigger:not(.listened)');

  triggers.forEach(trigger => { //For each trigger, listen
    // Marks as listened
    trigger.classList.add('listened');

    // Adds an event listener to the trigger
    trigger.addEventListener('click', function(event) {
      const alreadyActive = trigger.classList.contains('is-active');
      
      // First, try to deactivate all active triggers
      document.querySelectorAll('.trigger.is-active').forEach(activeTrigger => {
        activeTrigger.classList.remove('is-active');
      });

      // If the current trigger was not already active, activate it and perform the action
      if (!alreadyActive) {
        trigger.classList.add('is-active');
        // Execute the actions associated with the trigger
        const actions = trigger.getAttribute('data-action').split(',').map(a => a.trim());
        actionService(actions, trigger);
      }
    });
  });
}

// call triggerService after the content has loaded & after dinamic changes
window.addEventListener('DOMContentLoaded', triggerService);

function parseTriggerAction(actionString) { //Parse Trigger info for actionService
  // Define a regex pattern to extract components of the class.method(parameters) format
  const actionStructure = /^(.*?)\.(.*?)\((.*?)\)$/;
  const match = actionString.match(actionStructure);

  if (match) {
    // Decompose the action string into class name, method name, and parameters
    const actionClass = match[1];
    const actionMethod = match[2];
    const actionParameters = match[3].split(',').map(param => param.trim()).join(', ');

    // Return an object representing the parsed action details
    return {
      actionClass,
      actionMethod,
      actionParameters
    };
  } else {
    // Log an error if the action string format is unexpected
    console.error('Trigger data-action attribute is malformed:', actionString);
    return null;
  }
}

async function actionService(actions, trigger) { // Loop through each action string and parse it
  for (let actionString of actions) {
    const actionObject = parseTriggerAction(actionString);

    if (!actionObject) {
        console.error('Failed to parse action:', actionString);
        continue; // Skip to the next action if there's an error
    }

    const { actionClass, actionMethod, actionParameters } = actionObject;
    
    // Execute actions based on the class and method specified
    switch (actionClass) {
      case 'Tile':
        try {
          switch (actionMethod) {
            case 'add':
              await Tile.add(actionParameters, trigger);
              break;
            case 'remove':
              await Tile.remove(actionParameters, trigger);
              break;
            case 'mod':
              await Tile.mod(actionParameters, trigger);
              break;
            case 'clean':
              await Tile.clean(actionParameters, trigger);
              break;
            // Add cases for other methods as necessary
            default:
              console.warn(`Method ${actionMethod} is not supported for class ${actionClass}`);
          }
        } catch (error) {
          console.error(`Error executing method ${actionMethod} for class ${actionClass}:`, error);
        }
        break;
      // Add cases for other action classes if necessary
      default:
        console.warn(`Action class ${actionClass} is not recognized.`);
    }
  }
}


class updateDataAction { //Mod or add data-action attributes on DOM triggers

  static async mod(container, actionToUpdate, value, separator = ',') { //Mod Actions on specific Dom triggers

    // Query all elements that contain the action to update in their data-action attribute
    const elementsToUpdate = container.querySelectorAll(`[data-action*="${actionToUpdate}"]`);

    elementsToUpdate.forEach(element => {
      // Retrieve the current data-action value and split it into an array
      let actions = element.dataset.action;
      let actionsArray = actions.split(separator).map(action => action.trim());

      // Construct the new action string with the new value
      const newActionString = `${actionToUpdate}('${value}')`;

      // Update the specified action while preserving others
      actionsArray = actionsArray.map(action => {
        if (action.startsWith(actionToUpdate)) {
          return newActionString; // Use the newly constructed action string
        }
        return action; // Return the unchanged action for other actions
      });

      // Join the updated array back into a string and set it as the new data-action value
      let updatedActions = actionsArray.join(separator + ' ');
      element.dataset.action = updatedActions;
    });
  }

  static add(container, actionToAdd) { //Add Actions on specific Dom triggers
    // Query all elements within the container that have a data-action attribute
    const elementsToUpdate = container.querySelectorAll('[data-action]');

    elementsToUpdate.forEach(element => {
      // Split existing actions into an array
      const existingActions = element.dataset.action.split(', ').map(action => action.trim());
      
      // Check if the action to add already exists
      if (!existingActions.includes(actionToAdd)) {
        // If not, add the new action
        existingActions.push(actionToAdd);
        
        // Update the element's data-action attribute
        element.dataset.action = existingActions.join(', ');
      }
    });
  }

}
