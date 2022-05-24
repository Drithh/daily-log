const toggleShowDelete = (el) => {
  const deleteButton = el.querySelector('.delete');
  deleteButton.classList.toggle('!opacity-100');
};

const deleteRow = async (el) => {
  let success = true;
  const title = el.parentNode.parentNode
    .querySelector('.title')
    .innerHTML.trim();

  const res = await fetch(`log-handler.php?delete=${title}`, {
    method: 'GET',
  });
  [...res.headers].forEach(([key, value]) => {
    if (key === 'message') {
      alert(`Gagal Menghapus Row\n${value}`);
      success = false;
    }
  });
  if (success) {
    el.parentNode.parentNode.classList.add('animate-height-exit');
    await new Promise((r) => setTimeout(r, 700));
    el.parentNode.parentNode.remove();
  }
};

const addRow = async (el) => {
  let formData = new FormData();
  const title = el.querySelector('#title');
  const content = el.querySelector('#content');
  formData.append('title', title.value);
  formData.append('content', content.value);
  title.value = '';
  content.value = '';
  const res = await fetch('log-handler.php', {
    method: 'POST',
    body: formData,
  });
  [...res.headers].forEach(([key, value]) => {
    if (key === 'message') {
      alert(`Gagal Menambahkan Row\n${value}`);
    }
  });

  document.querySelector('#logs').innerHTML = await fetchData();
};

window.onload = async function () {
  document.querySelector('#logs').innerHTML = await fetchData();
};

const fetchData = async () => {
  const res = await fetch('logs.php');
  return await res.text();
};

if (window.history.replaceState) {
  window.history.replaceState(null, null, window.location.href);
}
