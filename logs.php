<?php
($encodedLogs = file_get_contents('daily-log.json', 'r')) or
  die('Unable to open file!');
$logs = json_decode($encodedLogs, true);
?>

<?php foreach ($logs as $title => $value) { ?>
    <div class="log w-full font-Source mb-16 h-auto" onmouseenter="toggleShowDelete(this)" onmouseleave="toggleShowDelete(this)">
        <div class="flex place-content-between">
            <div class="text-left font-thin text-primary  text-lg text-opacity-70">
                <?= $value['date'] ?>
            </div>
            <button  class="delete opacity-0 transition-all duration-500" onclick="deleteRow(this)">
                <svg class="w-6 h-6 text-secondary" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
        </div>
        <div class="title font-lg py-1 text-center text-xl leading-7 tracking-widest text-primary">
            <?= strtoupper($title) ?>
        </div>
        <div class="font-lg  font-light text-lg text-primary text-opacity-70 text-justify">
            <?= $value['content'] ?>
        </div>
    </div>
<?php }
?>
