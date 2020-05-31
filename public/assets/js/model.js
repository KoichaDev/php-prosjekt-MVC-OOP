// Everything related to JavaScript for model

document.addEventListener('DOMContentLoaded', () => {
  const comments = document.querySelector('.comments').children;

  // The goal is looping through deep down to the child Element to get the href
  for (const list of comments) {
    const commentBlock = list.children;
    for (const list of commentBlock) {
      const listBottomComment = list.children;
      for (const comment of listBottomComment) {
        const commentAction = comment.children;
        for (const ul of commentAction) {
          const li = ul.children;
          for (const complain of li) {
            const liComplain = complain.children;
            for (const a of liComplain) {
              // getting the a-element
              a.addEventListener('click', (e) => {
                // Checking the className of the DOM for the modal exist
                if (e.target.className === 'complain__model-btn') {
                  e.preventDefault();

                  // Model was original hidden, but after clicking the model, then we want to display it
                  document.querySelector('.modal-container').style.display =
                    'block;';
                  document.querySelector('.modal-btn').click();

                  // We want to get the URL Blog ID
                  const commentURL = e.target.href;
                  // The commentURL is a string, then we want to use split() function of the stringn
                  // Split() function will loop through the string and split / and return an array
                  const splitURL = commentURL.split('/');
                  // We want to get the last position of the array from theh splitURL
                  const getCommentID = splitURL[splitURL.length - 1];

                  // We want to use the commentID and add it to our input form for modal.
                  // The input is hidden, but value will always be dynamic based on the blog comment
                  document.querySelector(
                    '.report_blog_id'
                  ).value = getCommentID;
                }
              });
            }
          }
        }
      }
    }
  }

  // Event Listener for exiting the modal and clearing the message of text area
  document.querySelector('.modal-close').addEventListener('click', () => {
    document.querySelector('.textarea-input').value = '';
  });

  document.querySelector('.modal-backdrop').addEventListener('click', () => {
    document.querySelector('.textarea-input').value = '';
  });
});
