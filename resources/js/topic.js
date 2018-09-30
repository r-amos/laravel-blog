
export function topic() {
    addTopicActionListener();
}

const addTopicActionListener = function() {
    const button = getTopicButton();
    if(button) {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const topics = getTopicCollection(), 
                dropDown = getTopicInput();
            dropDown.name = `topics[${topics.children.length}]`;
            topics.appendChild(dropDown);
        });
    }
}

const getTopicButton = function() {
    return document.getElementById('js-topic-button');
}

const getTopicCollection = function() {
    return document.getElementById('js-topics');
}

const getTopicInput = function() {
    return document.getElementById('js-topic-dropdown')
        .cloneNode(true);
}
