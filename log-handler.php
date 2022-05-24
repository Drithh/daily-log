<div
    class="font-Source text-base text-primary opacity-80 mt-4 mb-24 py-12 border-y border-secondary border-opacity-70"
>   
    <div class="title text-center text-2xl font-medium leading-7 tracking-widest mb-6">Tambahkan Log</div>
    <form method="POST" onsubmit="addRow(this); return false;" class="wrapper flex place-content-end gap-6 flex-col px-4">
        <input
            id="title"
            name="title"
            class="block h-[40px] w-full appearance-none rounded py-3 px-4 leading-tight text-primary ring-1 ring-secondary ring-opacity-50 focus-visible:outline-none focus-visible:ring-blue-500 "
            type="text"
            placeholder="Judul"
        />
        <textarea
            rows="10"
            id="content"
            name="content"
            class="block h-60 w-full appearance-none rounded py-3 px-4 leading-tight text-primary ring-1 ring-secondary ring-opacity-50 focus-visible:outline-none focus-visible:ring-blue-500"
            type="text"
            placeholder="Content"
        ></textarea>
        <button  type="submit"  class="rounded border border-secondary py-2 px-10 border-opacity-50 hover:border-blue-500">Submit</button>
    </form>
</div>


<?php
if (isset($_POST['title']) && isset($_POST['content'])) {
  if (isset($_POST['title']) && isset($_POST['content'])) {
    $title = @$_POST['title'];
    $content = @$_POST['content'];
    $titleUsed = false;

    $log = [
      $title => [
        'date' => date('Y-m-d'),
        'content' => $content,
      ],
    ];

    $lastLogs = json_decode(file_get_contents('daily-log.json'), true);
    foreach ($lastLogs as $lastLog => $value) {
      if (strtolower($lastLog) == strtolower($title)) {
        echo '<script type ="text/JavaScript">';
        echo 'alert("Judul Sudah Ada")';
        echo '</script>';
        $titleUsed = true;
      }
    }

    if (!$titleUsed) {
      $logs = array_merge($lastLogs, $log);
      file_put_contents('daily-log.json', json_encode($logs)) or
        print_r(error_get_last());
    }
  }
}

if (isset($_GET['delete'])) {
  $title = $_GET['delete'];
  $logs = json_decode(file_get_contents('daily-log.json'), true);
  foreach ($logs as $logTitle => $value) {
    if (strtolower($logTitle) == strtolower($title)) {
      unset($logs[$logTitle]);
    }
  }
  file_put_contents('daily-log.json', json_encode($logs)) or
    print_r(error_get_last());
}


?>
