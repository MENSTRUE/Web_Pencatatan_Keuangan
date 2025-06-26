<!-- <div class="content-wrapper">
    <div class="card">
        <img src="" alt="">
    </div>
</div> -->

<div id="chart" class="content-wrapper"></div>

<div class="grid-container">
    <div id="pieChart" class="content-wrapper"></div>
    <div id="incomeBarChart" class="content-wrapper"></div> 
    <div id="expenseBarChart" class="content-wrapper"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    // Data from PHP
    const incomeData = <?= json_encode($data['income_data']); ?>;
    const expenseData = <?= json_encode($data['expense_data']); ?>;
    const incomeReportCount = <?= $data['income_report_count']['total_reports']; ?>;
    const expenseReportCount = <?= $data['expense_report_count']['total_reports']; ?>;

    // Prepare categories (x-axis labels)
    const incomeCategories = [...new Set(incomeData.map(item => `${item.year}-${item.month}`))];
    const expenseCategories = [...new Set(expenseData.map(item => `${item.year}-${item.month}`))];
    const categories = Array.from(new Set([...incomeCategories, ...expenseCategories])).sort();

    // Prepare data for chart
    const incomeSeries = categories.map(cat => {
        const record = incomeData.find(item => `${item.year}-${item.month}` === cat);
        return record ? record.total_amount_approved : 0;
    });

    const expenseSeries = categories.map(cat => {
        const record = expenseData.find(item => `${item.year}-${item.month}` === cat);
        return record ? record.total_amount_approved : 0;
    });

    // ApexCharts options for bar/line chart
    var options = {
        series: [
            {
                name: 'Pemasukan',
                type: 'column',
                data: incomeSeries,
                color: '#008FFB'
            },
            {
                name: 'Pengeluaran',
                type: 'column',
                data: expenseSeries,
                color: '#FF4560'
            },
            {
                name: 'Selisih',
                type: 'line',
                data: incomeSeries.map((value, index) => value - expenseSeries[index])
            }
        ],
        chart: {
            height: 350,
            type: 'line',
            stacked: false
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            width: [1, 1, 4]
        },
        title: {
            text: 'Laporan Keuangan Per Bulan',
            align: 'left',
            offsetX: 110
        },
        xaxis: {
            categories: categories
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();

    // Pie chart for report counts
    var pieOptions = {
        series: [incomeReportCount, expenseReportCount],
        chart: {
            type: 'pie',
            height: 350
        },
        labels: ['Laporan Pemasukan', 'Laporan Pengeluaran'],
        colors: ['#008FFB', '#FF4560'],
        title: {
            text: 'Perbandingan Jumlah Laporan'
        },
        legend: {
            position: 'bottom'
        }
    };

    var pieChart = new ApexCharts(document.querySelector("#pieChart"), pieOptions);
    pieChart.render();

    // Bar chart for income breakdown
    var incomeBarOptions = {
        series: [{
            name: 'Pemasukan',
            data: incomeSeries
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        colors: ['#008FFB'],
        xaxis: {
            categories: categories
        },
        title: {
            text: 'Distribusi Pemasukan'
        }
    };

    var incomeBarChart = new ApexCharts(document.querySelector("#incomeBarChart"), incomeBarOptions);
    incomeBarChart.render();

    // Bar chart for expense breakdown
    var expenseBarOptions = {
        series: [{
            name: 'Pengeluaran',
            data: expenseSeries
        }],
        chart: {
            type: 'bar',
            height: 350
        },
        colors: ['#FF4560'],
        xaxis: {
            categories: categories
        },
        title: {
            text: 'Distribusi Pengeluaran'
        }
    };

    var expenseBarChart = new ApexCharts(document.querySelector("#expenseBarChart"), expenseBarOptions);
    expenseBarChart.render();
</script>