document.addEventListener('DOMContentLoaded', () => {
  const selectRole = document.querySelectorAll('.select-role');
  const selectStatus = document.querySelectorAll('.select-status');
  const selectUserActive = document.querySelectorAll('.select-active-user');
  const selectToSort = document.querySelectorAll('#sort');

  // This is option for changing role of the user can be administrative or regular user
  for (const options of selectRole) {
    options.addEventListener('change', (e) => {
      console.log(e.target.value);
      // window.location.href = e.target.value;
    });
  }

  // This is option for changinge the value of status of the users if they are banned or not
  for (const options of selectStatus) {
    options.addEventListener('change', (e) => {
      window.location.href = e.target.value;
    });
  }

  // This is option for changing user active can be enabled or disabled
  for (const options of selectUserActive) {
    options.addEventListener('change', (e) => {
      window.location.href = e.target.value;
    });
  }

  // This will be sort based on options value
  for (const option of selectToSort) {
    option.addEventListener('change', (e) => {
      console.log(e.target.value);
      window.location.href = e.target.value;
    });
  }
});
