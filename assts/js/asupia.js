function checkImportantNews() {
  const importantNewsWrapper = document.querySelector('#vkexunit_post_list-3');
  if (!importantNewsWrapper) return;

  const newsList = importantNewsWrapper.querySelector('ul');
  if (!newsList) {
    importantNewsWrapper.style.display = "none";
  }
}
document.addEventListener('DOMContentLoaded', checkImportantNews);