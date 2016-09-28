<!DOCTYPE html>
<html>
<head>
    <base href="http://demos.telerik.com/kendo-ui/datetimepicker/rangeselection">
    <link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.1.406/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.1.406/styles/kendo.material.min.css" />
    <script src="//kendo.cdn.telerik.com/2016.1.406/js/jquery.min.js"></script>
    <script src="//kendo.cdn.telerik.com/2016.1.406/js/kendo.all.min.js"></script>
</head>
<body>

        <div id="example">
            <div class="demo-section k-content">

                <h4>Start date</h4>
                <input id="start" style="width: 100%;" />

                <h4 style="margin-top: 2em;">End date</h4>
                <input id="end" style="width: 100%;" />

            </div>
            <script>
                $(document).ready(function() {
                    function startChange() {
                        var startDate = start.value(),
                        endDate = end.value();
                        if (startDate) {
                            startDate = new Date(startDate);
                            startDate.setDate(startDate.getDate());
                            end.min(startDate);
                        } else if (endDate) {
                            start.max(new Date(endDate));
                        } else {
                            endDate = new Date();
                            start.max(endDate);
                            end.min(endDate);
                        }
                    }

                    function endChange() {
                        var endDate = end.value(),
                        startDate = start.value();

                        if (endDate) {
                            endDate = new Date(endDate);
                            endDate.setDate(endDate.getDate());
                            start.max(endDate);
                        } else if (startDate) {
                            end.min(new Date(startDate));
                        } else {
                            endDate = new Date();
                            start.max(endDate);
                            end.min(endDate);
                        }
                    }

                    var today = kendo.date.today();

                    var start = $("#start").kendoDateTimePicker({
                        value: today,
                        change: startChange,
                        parseFormats: ["MM/dd/yyyy"]
                    }).data("kendoDateTimePicker");

                    var end = $("#end").kendoDateTimePicker({
                        value: today,
                        change: endChange,
                        parseFormats: ["MM/dd/yyyy"]
                    }).data("kendoDateTimePicker");

                    start.max(end.value());
                    end.min(start.value());
                });
            </script>

        </div>


</body>
</html>
