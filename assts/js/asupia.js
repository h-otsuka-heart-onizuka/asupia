function getID() {
  const importantNewsWrapper = document.querySelector('#vkexunit_post_list-3');
  if (!importantNewsWrapper) return;

  const newsList = importantNewsWrapper.querySelector('ul');
  if (!newsList) {
    importantNewsWrapper.style.display = "none";
  } 
}