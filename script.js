const toggleShowDelete = (el) => {
  const deleteButton = el.querySelector('.delete');
  deleteButton.classList.toggle('!opacity-100');
};

const deleteRow = async (el) => {
  el.parentNode.parentNode.classList.add('animate-height-exit');
  await new Promise((r) => setTimeout(r, 700));
  el.parentNode.parentNode.remove();
  const title = el.parentNode.parentNode
    .querySelector('.title')
    .innerHTML.trim();

  fetch(`log-handler.php?delete=${title}`, {
    method: 'GET',
  }).then((res) => {
    console.log(res.text);
  });
};
