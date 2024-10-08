@extends('web.layout.public')
@section('title', 'Add Survey - '.config('app.name'))
@section('main')
<div class="container mt-5">
    @include('common.status')
    <div class="card p-3 shadow border-0 mb-3">
        <div class="card-body">
            <div class="card-header bg-white border-0 d-flex justify-content-between">
                <div><h5 class="d-inline"><i class="bi bi-app-indicator"></i> Add Survey form</h5>
                </div>
            </div>
            <div class="mb-2 form-group col-md-3">
                <label for="element-type">Add Element</label>
                <select id="element-type" class="form-control">
                    <option value="">--Select--</option>
                    <option value="radio">Radio Button</option>
                    <option value="checkbox">Checkbox</option>
                    <option value="textarea">Text Area</option>
                    <option value="textbox">Text Box</option>
                </select>&nbsp;
                <button class="btn btn-primary" id="add-element">Add Element</button>
            </div>
            <form id="survey-form" action="{{ route('survey.save') }}" method="POST">
                @csrf
                <input type="hidden" name="app_id" value="{{ $app->id }}">
                <div id="basic-survey-question">
                    <div class="form-group">
                        <label for="title">Title: </label>
                        <input type="text" class="form-control" name="title" placeholder="Survey title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description: </label>
                        <textarea class="form-control" name="description" cols="25" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="startDate">Start Date: </label>
                        <input type="date" name="startDate" required value="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="endDate">End Date: </label>
                        <input type="date" name="endDate" required value="{{ \Carbon\Carbon::now()->addDays(3)->format('Y-m-d') }}" class="form-control">
                    </div>
                </div>
                <div id="question-container"></div>
                <button class="btn btn-primary" type="submit">Submit Survey</button>
            </form>
        </div>
    </div>
</div>

<script>
    let count = 0;
    document.getElementById('add-element').addEventListener('click', function() {
        const elementType = document.getElementById('element-type').value;
        const questionContainer = document.getElementById('question-container');
        
        if (elementType) {
            count++;
            const elementDiv = document.createElement('div');
            elementDiv.classList.add('element','form-group');

            // Add a question textbox
            elementDiv.innerHTML += `<input type="text" class="form-control" name="questions[${count}][text]" placeholder="Enter your question here" required />`;
            elementDiv.innerHTML += `<input type="hidden" name="questions[${count}][type]" value="${elementType}">`;

            // Create the corresponding input element based on the selection
            if (elementType === 'radio' || elementType === 'checkbox') {
                elementDiv.innerHTML += `<div class="multi-options" data-count="${count}"><div class="form-check"><input type="${elementType}" class="form-check-input" disabled name="a"><input type="text" class="form-control" name="questions[${count}][options][]" placeholder="Option Text" required></div> <div class="form-check"><input type="${elementType}" class="form-check-input" disabled name="a"><input type="text" class="form-control" name="questions[${count}][options][]" placeholder="Option Text" required></div></div>`;
                const addOptionButton = document.createElement('button');
                addOptionButton.textContent = 'Add Option';
                addOptionButton.type = 'button';
                addOptionButton.classList.add('form-control');
                addOptionButton.addEventListener('click', () => addOption(elementDiv, elementType));
                elementDiv.appendChild(addOptionButton);
            } else if (elementType === 'textarea') {
                const textarea = document.createElement('textarea');
                textarea.disabled = true;
                textarea.placeholder = 'Your answer here...';
                textarea.classList.add('form-control');
                elementDiv.appendChild(textarea);
            } else if (elementType === 'textbox') {
                const textbox = document.createElement('input');
                textbox.type = 'text';
                textbox.disabled = true;
                textbox.placeholder = 'Your answer here...';
                textbox.classList.add('form-control');
                elementDiv.appendChild(textbox);
            }
            questionContainer.appendChild(elementDiv);
        }
    });

    function addOption(elementDiv, type) {
        let id = elementDiv.querySelector('.multi-options').getAttribute('data-count');
        const optionInput = document.createElement('input');
        optionInput.type = type;
        optionInput.disabled = true;
        optionInput.classList.add('form-check-input');

        const optionLabel = document.createElement('input');
        optionLabel.type = 'text';
        optionLabel.name = `questions[${id}][options][]`;
        optionLabel.placeholder = 'Option Text';
        optionLabel.required = true;
        optionLabel.classList.add('form-control');

        const removeButton = document.createElement('button');
        removeButton.textContent = 'Remove Option';
        removeButton.type = 'button';
        removeButton.classList.add('form-control');
        removeButton.addEventListener('click', () => elementDiv.querySelector('.multi-options').removeChild(optionDiv));

        const optionDiv = document.createElement('div');
        optionDiv.classList.add('form-check');
        optionDiv.appendChild(optionInput);
        optionDiv.appendChild(optionLabel);
        optionDiv.appendChild(removeButton);
        
        elementDiv.querySelector('.multi-options').appendChild(optionDiv);
    }
</script>
@endsection