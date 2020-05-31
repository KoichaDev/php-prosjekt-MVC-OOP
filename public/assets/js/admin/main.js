document.addEventListener('DOMContentLoaded', () => {
  const checkBox = document.querySelector('#add-all-users');
  const inputMember = document.querySelector('.invite-members');
  const lastInputElement = document.querySelector('.input-field');
  const inputField = document.querySelector('.input-field');
  const submit = document.querySelector('.submit');

  checkBox.addEventListener('click', () => {
    if (checkBox.checked === false) {
      inputMember.style.display = 'block';
    } else {
      inputMember.style.display = 'none';
    }
  });

  const addNewInput = () => {
    const editor = document.querySelector('.editor');
    // Creating new element for the DOM
    const input = document.createElement('input');

    // Add name attribute

    input.setAttribute('name', 'members[]');

    // Add Placeholder of the input Element

    input.placeholder = 'Add Another Member...';

    // Adding the DOM attribute of input, which will be <input type="submit" />
    input.setAttribute('type', 'text');

    inputField.appendChild(input);
  };

  // Checking if the DOM has changed such as inputting something
  inputMember.addEventListener('change', (e) => {
    // If the value or the input is NOT empty
    if (e.target.value !== '') {
      // Then we will create a new input Field of the DOM
      addNewInput();

      lastInputElement.lastElementChild.addEventListener('change', (e) => {
        if (e.target.value !== '') {
          addNewInput();
        } else {
          lastInputElement.lastElementChild.remove();
        }
      });
    } else {
      // If the last element is empty, then we will just remove it
      lastInputElement.lastElementChild.remove();
    }
  });

  submit.addEventListener('click', (e) => {
    lastInputElement.lastElementChild.remove();
  });
});
