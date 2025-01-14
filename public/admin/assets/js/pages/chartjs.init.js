! function(i) {
    "use strict";
    var r = function() {};
    r.prototype.respChart = function(r, o, a, e) {
        Chart.defaults.global.defaultFontColor = "#6c7897", Chart.defaults.scale.gridLines.color = "rgba(108, 120, 151, 0.1)";
        var t = r.get(0).getContext("2d"),
            d = i(r).parent();

        function n() {
            r.attr("width", i(d).width());
            switch (o) {
                case "Line":
                    new Chart(t, { type: "line", data: a, options: e });
                    break;
                case "Doughnut":
                    new Chart(t, { type: "doughnut", data: a, options: e });
                    break;
                case "Pie":
                    new Chart(t, { type: "pie", data: a, options: e });
                    break;
                case "Bar":
                    new Chart(t, { type: "bar", data: a, options: e });
                    break;
                case "Radar":
                    new Chart(t, { type: "radar", data: a, options: e });
                    break;
                case "PolarArea":
                    new Chart(t, { data: a, type: "polarArea", options: e })
            }
        }
        i(window).resize(n), n()
    }, r.prototype.init = function() {
        this.respChart(i("#lineChart"), "Line", { labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September"], datasets: [{ label: "Sales Analytics", fill: !1, lineTension: .1, backgroundColor: "#039cfd", borderColor: "#039cfd", borderCapStyle: "butt", borderDash: [], borderDashOffset: 0, borderJoinStyle: "miter", pointBorderColor: "#039cfd", pointBackgroundColor: "#fff", pointBorderWidth: 1, pointHoverRadius: 5, pointHoverBackgroundColor: "#039cfd", pointHoverBorderColor: "#eef0f2", pointHoverBorderWidth: 2, pointRadius: 1, pointHitRadius: 10, data: [65, 59, 80, 81, 56, 55, 40, 35, 30] }] }, { scales: { yAxes: [{ ticks: { max: 100, min: 20, stepSize: 10 } }] } });
        this.respChart(i("#doughnut"), "Doughnut", { labels: ["Desktops", "Tablets", "Mobiles"], datasets: [{ data: [300, 50, 100], backgroundColor: ["#3db9dc", "#f1b53d", "#ff5d48"], hoverBackgroundColor: ["#3db9dc", "#f1b53d", "#ff5d48"], hoverBorderColor: "#fff" }] });
        this.respChart(i("#pie"), "Pie", { labels: ["Desktops", "Tablets", "Mobiles"], datasets: [{ data: [300, 50, 100], backgroundColor: ["#3db9dc", "#f1b53d", "#ff5d48"], hoverBackgroundColor: ["#3db9dc", "#f1b53d", "#ff5d48"], hoverBorderColor: "#fff" }] });
        this.respChart(i("#bar"), "Bar", { labels: ["January", "February", "March", "April", "May", "June", "July"], datasets: [{ label: "Sales Analytics", backgroundColor: "rgba(27,185,154,0.3)", borderColor: "#1bb99a", borderWidth: 1, hoverBackgroundColor: "rgba(27,185,154,0.6)", hoverBorderColor: "#1bb99a", data: [65, 59, 80, 81, 56, 55, 40, 20] }] });
        this.respChart(i("#radar"), "Radar", { labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"], datasets: [{ label: "Desktops", backgroundColor: "rgba(179,181,198,0.2)", borderColor: "rgba(179,181,198,1)", pointBackgroundColor: "rgba(179,181,198,1)", pointBorderColor: "#fff", pointHoverBackgroundColor: "#fff", pointHoverBorderColor: "rgba(179,181,198,1)", data: [65, 59, 90, 81, 56, 55, 40] }, { label: "Tablets", backgroundColor: "rgba(255,99,132,0.2)", borderColor: "rgba(255,99,132,1)", pointBackgroundColor: "rgba(255,99,132,1)", pointBorderColor: "#fff", pointHoverBackgroundColor: "#fff", pointHoverBorderColor: "rgba(255,99,132,1)", data: [28, 48, 40, 19, 96, 27, 100] }] }, { scale: { angleLines: { color: "rgba(108, 120, 151, 0.1)" } } });
        this.respChart(i("#polarArea"), "PolarArea", { datasets: [{ data: [11, 16, 7, 3, 14], backgroundColor: ["#039cfd", "#f1b53d", "#ff5d48", "#E7E9ED", "#9261c6"], label: "My dataset", hoverBorderColor: "#fff" }], labels: ["Series 1", "Series 2", "Series 3", "Series 4", "Series 5"] })
    }, i.ChartJs = new r, i.ChartJs.Constructor = r
}(window.jQuery),
function(r) {
    "use strict";
    window.jQuery.ChartJs.init()
}();