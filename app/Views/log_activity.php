<body>
    <div class="midde_cont">
        <div class="container-fluid">
            <div class="row column_title">
                <div class="col-md-12">
                    <div class="page_title">
                        <h2>Log Activity</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="white_shd full margin_bottom_30">
                        <div class="full graph_head">
                            <div class="heading1 margin_0">
                                <h2>User Activity Log</h2>
                            </div>
                        </div>
                        <div class="full inbox_inner_section">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="full padding_infor_info">
                                        <div class="mail-box">
                                            <aside class="sm-side">
                                                <div class="user-head">
                                                    <div class="user-name">
                                                    </div>
                                                </div>
                                                <div class="inbox-body">
                                                    <a href="#myModal" data-toggle="modal" title="Compose" class="btn btn-compose">
                                                        Compose
                                                    </a>
                                                </div>
                                                <ul class="nav nav-pills nav-stacked labels-category inbox-divider">
                                                    <li>
                                                        <h4>Categories</h4>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-circle"></i> Activity</a></li>
                                                    <li><a href="#"><i class="fa fa-circle"></i> Logs</a></li>
                                                </ul>
                                            </aside>
                                            <aside class="lg-side">
                                                <div class="inbox-head">
                                                    <h3>Activity Log (<?= count($logs) ?>)</h3>
                                                    <form action="#" class="pull-right position search_inbox">
                                                        <div class="input-append">
                                                            <input type="text" class="sr-input" placeholder="Search Activity">
                                                            <button class="btn sr-btn" type="button"><i class="fa fa-search"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="inbox-body">
                                                    <table class="table table-inbox table-hover">
                                                        <thead>
                                                            <tr>
                                                                <th></th>
                                                                <th>Username</th>
                                                                <th>Activity</th>
                                                                <th>Time</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($logs as $log): ?>
                                                            <tr class="unread">
                                                                <td class="inbox-small-cells">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="customCheck<?= $log->id_log ?>">
                                                                        <label class="custom-control-label" for="customCheck<?= $log->id_log ?>"></label>
                                                                    </div>
                                                                </td>
                                                                <td class="view-message dont-show"><?= esc($log->username); ?></td>
                                                                <td class="view-message"><?= esc($log->activity); ?></td>
                                                                <td class="view-message text-right"><?= esc($log->time); ?></td>
                                                            </tr>
                                                            <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                    <ul class="unstyled inbox-pagination">
                                                        <li><span>Showing 1-<?= count($logs) ?> of <?= $totalLogs ?></span></li>
                                                    </ul>
                                                </div>
                                            </aside>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="<?= base_url('public/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('public/js/bootstrap.min.js') ?>"></script>
</body>