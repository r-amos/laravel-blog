
export function topic() {
    getTopicButton();
}

const getTopicButton = function() {
    document.getElementById('js-topic-button').addEventListener('click', (event) => {
        event.preventDefault();
        const topics = getTopicCollection(), 
            dropDown = getTopicInput();
        dropDown.name = `topics[${topics.children.length}]`;
        topics.appendChild(dropDown);
    });
}

const getTopicCollection = function() {
    return document.getElementById('js-topics');
}

const getTopicInput = function() {
    return document.getElementById('js-topic-dropdown')
        .cloneNode(true);
}
