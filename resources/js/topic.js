const init = function() {
    addTopicActionListener();
    addDeleteActionListener();
}

const addTopicActionListener = function() {
    const button = getTopicButton();
    if (button) {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const topics = getTopicCollection(), 
                dropDown = getTopicInput();
                // @TODO: Dynamically Get The Length Here.            
                dropDown.name = `topics[${topics.children.length}]`;
            const selectedTopics = getTopicsSelected(topics);
            Array.from(dropDown.children).forEach((element) => {
                if (selectedTopics.includes(element.value)) {
                    element.remove();
                }
            });
            topics.appendChild(dropDown);
            const deleteButton = createDeleteButton();
            deleteButton.addEventListener('click', (event) => {
                event.preventDefault();
                dropDown.remove();
                deleteButton.remove();
                updateIndexes();
            });
            topics.appendChild(deleteButton);
        });
    }
}

const addDeleteActionListener = function() {
    const buttons = getTopicDeleteButtons();
    if (buttons) {
        buttons.forEach((button) => {
            button.addEventListener('click', (event) => {
                    event.preventDefault();
                    const select = button.previousElementSibling;
                    select.remove();
                    button.remove();
                    updateIndexes();
            });
        });
    }
}

const updateIndexes = function() {
    Array.from(document.getElementById('js-topics').children).filter((element) => {
            return element.tagName === 'SELECT';
        }).forEach((select, index) => {
            select.name=`topics[${index}]`; 
        }); 
}

const getTopicButton = function() {
    return document.getElementById('js-topic-button');
}

const getTopicDeleteButtons = function() {
    return Array.from(document.getElementsByTagName('button')).filter((element) => {
        return element.id === 'js-delete-tag'
    });
}

const getTopicCollection = function() {
    return document.getElementById('js-topics');
}

const getTopicInput = function() {
    return document.getElementById('js-topic-dropdown')
        .cloneNode(true);
}

const getTopicsSelected = function(topicCollection) {
    return Array.from(topicCollection.children).map((element) => element.value); 
}

const createDeleteButton = function() {
    const deleteButton = document.createElement("button");
    deleteButton.className = "button button--delete";
    deleteButton.innerText = "Delete"
    deleteButton.id="js-delete-tag";
    return deleteButton;
}

export default init;

