const init = function() {
    addTagActionListener();
    addDeleteActionListener();
}

const addTagActionListener = function() {
    const button = getTagButton();
    if (button) {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const tags = getTagCollection(), 
                dropDown = getTagInput();
                // @TODO: Dynamically Get The Length Here.            
                dropDown.name = `tags[${tags.children.length}]`;
            const selectedTags = getTagsSelected(tags);
            Array.from(dropDown.children).forEach((element) => {
                if (selectedTags.includes(element.value)) {
                    element.remove();
                }
            });
            tags.appendChild(dropDown);
            const deleteButton = createDeleteButton();
            deleteButton.addEventListener('click', (event) => {
                event.preventDefault();
                dropDown.remove();
                deleteButton.remove();
                updateIndexes();
            });
            tags.appendChild(deleteButton);
        });
    }
}

const addDeleteActionListener = function() {
    const buttons = getTagDeleteButtons();
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
    Array.from(document.getElementById('js-tags').children).filter((element) => {
            return element.tagName === 'SELECT';
        }).forEach((select, index) => {
            select.name=`tags[${index}]`; 
        }); 
}

const getTagButton = function() {
    return document.getElementById('js-tag-button');
}

const getTagDeleteButtons = function() {
    return Array.from(document.getElementsByTagName('button')).filter((element) => {
        return element.id === 'js-delete-tag'
    });
}

const getTagCollection = function() {
    return document.getElementById('js-tags');
}

const getTagInput = function() {
    return document.getElementById('js-tag-dropdown')
        .cloneNode(true);
}

const getTagsSelected = function(tagCollection) {
    return Array.from(tagCollection.children).map((element) => element.value); 
}

const createDeleteButton = function() {
    const deleteButton = document.createElement("button");
    deleteButton.className = "button button--delete tags__button";
    deleteButton.innerText = "Delete"
    deleteButton.id="js-delete-tag";
    return deleteButton;
}

export default init;

