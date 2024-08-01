document.addEventListener('DOMContentLoaded', function() {
    var addButton = document.getElementById('addData');
    var fieldsContainer = document.querySelector('.ikuk-fields');
    var template = document.querySelector('.ikuk-template');

    addButton.addEventListener('click', function() {
        var newIndex = document.querySelectorAll('.ikuk-fields .row').length;
        var newTemplate = template.cloneNode(true);
        newTemplate.style.display = 'block';

        var inputs = newTemplate.querySelectorAll('input, select');
        inputs.forEach(function(input) {
            input.value = '';
        });

        fieldsContainer.appendChild(newTemplate);

        var removeButton = newTemplate.querySelector('.remove-btn');
        removeButton.addEventListener('click', function() {
            newTemplate.remove();
        });
    });
});
