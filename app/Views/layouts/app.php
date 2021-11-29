<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Custom Fonts -->
    <link rel="stylesheet" href="<?= base_url("/assets/css/fonts.css") ?>">
    <link rel="stylesheet" href="<?= base_url("/assets/plugins/feather-font/src/css/iconfont.css") ?>">
    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= base_url("/assets/plugins/bootstrap/css/bootstrap.min.css") ?>">
    <?= $this->renderSection("style") ?>
    <!-- Custom style -->
    <link rel="stylesheet" href="<?= base_url("/assets/css/styles.css") ?>">
    <title><?= $title ?? config("App")->siteName ?></title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm mb-3">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="<?= base_url("/assets/img/copilot.png") ?>" alt="logo" class="mb-1">
            </a>
            <h1 class="page-title"><?= $title ?? "Copilot" ?></h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                            <i class="feather icon-home"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled">Disabled</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- main content -->
    <main>
        <?= $this->renderSection("content") ?>
    </main>

    <!-- bootstrap js -->
    <script src="<?= base_url("/assets/plugins/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
    <!-- custom js -->
    <script src="<?= base_url("/assets/js/scripts.js") ?>"></script>
    <?= $this->renderSection("script") ?>
</body>

</html>