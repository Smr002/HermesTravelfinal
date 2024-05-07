<?php
$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
} else { 

    
    $client_query = "SELECT COUNT(*) AS client_count FROM Client WHERE Type = 'Client'";
    $client_result = mysqli_query($conn, $client_query);
    if (!$client_result) {
        die("Query Failed : " . mysqli_error($conn));
    }
    $client_row = mysqli_fetch_assoc($client_result);
    $client_count = $client_row['client_count'];

    // Query to count staff (types other than 'Client') in the Client table
    $staff_query = "SELECT COUNT(*) AS staff_count FROM Client WHERE Type != 'Client'";
    $staff_result = mysqli_query($conn, $staff_query);
    if (!$staff_result) {
        die("Query Failed : " . mysqli_error($conn));
    }
    $staff_row = mysqli_fetch_assoc($staff_result);
    $staff_count = $staff_row['staff_count'];

    // Query to sum all ClientSpendings from Booking table
    $sales_query = "SELECT SUM(ClientSpendings) AS total_sales FROM Booking";
    $sales_result = mysqli_query($conn, $sales_query);
    if (!$sales_result) {
        die("Query Failed : " . mysqli_error($conn));
    }
    $sales_row = mysqli_fetch_assoc($sales_result);
    $total_sales = $sales_row['total_sales'];

    // Query to count number of destinations
    $destinations_query = "SELECT COUNT(*) AS destination_count FROM Destination";
    $destinations_result = mysqli_query($conn, $destinations_query);
    if (!$destinations_result) {
        die("Query Failed : " . mysqli_error($conn));
    }
    $destinations_row = mysqli_fetch_assoc($destinations_result);
    $destination_count = $destinations_row['destination_count'];

    // Query to get top 5 clients based on spending
    $top_clients_query = "SELECT ClientName, SUM(ClientSpendings) AS total_spending FROM Client INNER JOIN Booking ON Client.ClientID = Booking.ClientID GROUP BY Client.ClientID ORDER BY total_spending DESC LIMIT 5";
    $top_clients_result = mysqli_query($conn, $top_clients_query);
    $top_clients_data = [];
    while ($row = mysqli_fetch_assoc($top_clients_result)) {
        $top_clients_data[$row['ClientName']] = $row['total_spending'];
    }

    // Query to get top 5 destinations
    $top_destinations_query = "SELECT DestinationName, COUNT(BookingID) AS booking_count FROM Destination INNER JOIN Booking ON Destination.DestinationID = Booking.DestinationID GROUP BY Destination.DestinationID ORDER BY booking_count DESC LIMIT 5";
    $top_destinations_result = mysqli_query($conn, $top_destinations_query);
    $top_destinations_data = [];
    while ($row = mysqli_fetch_assoc($top_destinations_result)) {
        $top_destinations_data[$row['DestinationName']] = $row['booking_count'];
    }
}
?>

<main class="main-container">
    <div class="main-title">
        <h2>Welcome admin</h2>
    </div>
    <div class="main-cards">
        <div class="card">
            <div class="card-inner">
                <h3>Clients</h3>
                <span class="material-icons-outlined">people</span>
            </div>
            <h1><?php echo htmlspecialchars($client_count); ?></h1>
        </div>
        <div class="card">
            <div class="card-inner">
                <h3>Staff</h3>
                <span class="material-icons-outlined">manage_accounts</span>
            </div>
            <h1><?php echo htmlspecialchars($staff_count); ?></h1>
        </div>
        <div class="card">
            <div class="card-inner">
                <h3>Total Sales</h3>
                <span class="material-icons-outlined">monetization_on</span>
            </div>
            <h1><?php echo htmlspecialchars($total_sales); ?></h1>
        </div>
        <div class="card">
            <div class="card-inner">
                <h3>Destinations</h3>
                <span class="material-icons-outlined">place</span>
            </div>
            <h1><?php echo htmlspecialchars($destination_count); ?></h1>
        </div>
    </div>
    <div class="charts">
        <div class="chart-card">
            <h2>Top 5 Clients</h2>
            <div id="bar-chart"></div>
        </div>

        <div class="chart-card">
            <h2>Top 5 Destinations</h2>
            <div id="area-chart"></div>
        </div>
        
    </div>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.49.0/apexcharts.min.js"></script>
<script>
const topClientsData = <?php echo json_encode($top_clients_data); ?>;
const topDestinationsData = <?php echo json_encode($top_destinations_data); ?>;

// Bar Chart for Top 5 Clients
const barChartOptions = {
    series: [{
        data: Object.values(topClientsData),
        name: 'Spending ($)',
    }],
    chart: {
        type: 'bar',
        background: 'transparent',
        height: 350,
        toolbar: {
            show: false,
        },
    },
    colors: ['#2962ff', '#d50000', '#2e7d32', '#ff6d00', '#583cb3'],
    plotOptions: {
        bar: {
            distributed: true,
            borderRadius: 4,
            horizontal: true,
            columnWidth: '40%',
        },
    },
    dataLabels: {
        enabled: false,
    },
    fill: {
        opacity: 1,
    },
    grid: {
        borderColor: '#55596e',
        xaxis: {
            lines: {
                show: true,
            },
        },
        yaxis: {
            lines: {
                show: true,
            },
        },
    },
    legend: {
        labels: {
            colors: '#f5f7ff',
        },
        show: true,
        position: 'top',
    },
    stroke: {
        colors: ['transparent'],
        show: true,
        width: 2,
    },
    tooltip: {
        shared: true,
        intersect: false,
        theme: 'dark',
    },
    xaxis: {
        categories: Object.keys(topClientsData),
        title: {
            style: {
                color: '#f5f7ff',
            },
        },
        axisBorder: {
            show: true,
            color: '#55596e',
        },
        axisTicks: {
            show: true,
            color: '#55596e',
        },
        labels: {
            style: {
                colors: '#f5f7ff',
            },
        },
    },
    yaxis: {
        title: {
            text: 'Clients',
            style: {
                color: '#f5f7ff',
            },
        },
        axisBorder: {
            color: '#55596e',
            show: true,
        },
        axisTicks: {
            color: '#55596e',
            show: true,
        },
        labels: {
            style: {
                colors: '#f5f7ff',
            },
        },
    },
};

const barChart = new ApexCharts(
    document.querySelector('#bar-chart'),
    barChartOptions
);
barChart.render();

// Area Chart for Top 5 Destinations
const areaChartOptions = {
    series: [{
        name: 'Bookings',
        data: Object.values(topDestinationsData),
    }],
    chart: {
        type: 'area',
        background: 'transparent',
        height: 350,
        toolbar: {
            show: false,
        },
    },
    colors: ['#00ab57'],
    labels: Object.keys(topDestinationsData),
    dataLabels: {
        enabled: false,
    },
    fill: {
        gradient: {
            opacityFrom: 0.4,
            opacityTo: 0.1,
            shadeIntensity: 1,
            stops: [0, 100],
            type: 'vertical',
        },
        type: 'gradient',
    },
    grid: {
        borderColor: '#55596e',
        xaxis: {
            lines: {
                show: true,
            },
        },
        yaxis: {
            lines: {
                show: true,
            },
        },
    },
    legend: {
        labels: {
            colors: '#f5f7ff',
        },
        show: true,
        position: 'top',
    },
    markers: {
        size: 6,
        strokeColors: '#1b2635',
        strokeWidth: 3,
    },
    stroke: {
        curve: 'smooth',
    },
    xaxis: {
        axisBorder: {
            color: '#55596e',
            show: true,
        },
        axisTicks: {
            color: '#55596e',
            show: true,
        },
        labels: {
            offsetY: 5,
            style: {
                colors: '#f5f7ff',
            },
        },
    },
    yaxis: {
        title: {
            text: 'Bookings',
            style: {
                color: '#f5f7ff',
            },
        },
        axisBorder: {
            color: '#55596e',
            show: true,
        },
        axisTicks: {
            color: '#55596e',
            show: true,
        },
        labels: {
            style: {
                colors: '#f5f7ff',
            },
        },
    },
    tooltip: {
        shared: true,
        intersect: false,
        theme: 'dark',
    },
};

const areaChart = new ApexCharts(
    document.querySelector('#area-chart'),
    areaChartOptions
);
areaChart.render();
</script>


