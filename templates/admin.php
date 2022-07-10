<html>
    <head>
        <link rel="stylesheet" href="./css/dashboard.css">
        <script src="./js/admin_dashboard.js"></script>
    </head>
    <body>
        <div class="mx-5" id="table-container">
            <span class="text-center">
                <h2 id="clock"></h2>
            </span>
            <table id="records-table" class="table-sm table table-bordered text-center border-dark table-striped">
                <thead class="sticky-top table-secondary border-dark">
                    <tr>
                        <th class="text-center table-warning" colspan="7"><h5>User Logs</h5></th>
                    </tr>
                    <tr>
                        <th>Name</th>
                        <th>Agency</th>
                        <th>Type</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody id="logs">
                </tbody>
            </table>
        </div>     
    </body>
</html>