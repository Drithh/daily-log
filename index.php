<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daily Log</title>
    <link rel="stylesheet" href="style.css" />
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;400&family=PT+Sans&family=Source+Sans+Pro&display=swap');
    </style>
    <script src="script.js"></script>
  </head>

  <body
    class="flex min-w-[768px] flex-col place-content-center place-items-center"
  >
    <svg class="hidden" version="2.0">
      <defs>
        <symbol id="trash-bin" viewbox="0 0 256 256">

        </symbol>
        <symbol id="check" viewbox="0 0 256 256">

        </symbol>
      </defs>
    </svg>
    <header class="mt-20 flex flex-col place-content-center place-items-center">
      <div class="mb-4 text-center font-PT text-6xl font-medium text-primary">
        Daily Log
      </div>
      <div
        class="text-center font-Josefin text-xl font-medium tracking-wider text-primary"
      >
        Dokumentasikan kegiatan mu setiap hari!
      </div>
    </header>

    <main class="mt-32 flex w-full max-w-4xl flex-col lg:w-[90%]">
    <?php include 'logs.php'; ?>
    <?php include 'log-handler.php'; ?>
    </main>
  </body>
</html>
