document.addEventListener('DOMContentLoaded', () => {
  const table = document.querySelectorAll('#table > tbody > tr');

  for (const td of table) {
    const pendingCell = td.querySelector(`td[data-title="pending"]`);
    const goingCell = td.querySelector(`td[data-title="going"]`);
    const interestedCell = td.querySelector(`td[data-title="interested"]`);
    const notGoingcell = td.querySelector(`td[data-title="not-going"]`);
    switch (true) {
      case pendingCell.textContent.trim() === goingCell.textContent.trim():
        pendingCell.textContent = '';
        break;
      case pendingCell.textContent.trim() === interestedCell.textContent.trim():
        pendingCell.textContent = '';
        break;
      case pendingCell.textContent.trim() === notGoingcell.textContent.trim():
        pendingCell.textContent = '';
        break;
      default:
        break;
    }
  }
});
