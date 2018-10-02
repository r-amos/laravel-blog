const init = function() {
    addTopicActionListener();
}

const addTopicActionListener = function() {
    const button = getTopicButton();
    if (button) {
        button.addEventListener('click', (event) => {
            event.preventDefault();
            const topics = getTopicCollection(), 
                dropDown = getTopicInput();
            dropDown.name = `topics[${topics.children.length}]`;
            const selectedTopics = getTopicsSelected(topics);
            Array.from(dropDown.children).forEach((element) => {
                if (selectedTopics.includes(element.value)) {
                    element.remove();
                }
            });
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

const getTopicsSelected = function(topicCollection) {
    return Array.from(topicCollection.children).map((element) => element.value); 
}

export default init;

