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

    
    
    
    // Query to sum all ClientSpendings from Booking table
    // $sales_query = "SELECT SUM(ClientSpendings) AS total_sales FROM Booking";
    // $sales_result = mysqli_query($conn, $sales_query);
    // if (!$sales_result) {
    //     die("Query Failed : " . mysqli_error($conn));
    // }
    // $sales_row = mysqli_fetch_assoc($sales_result);
    // $total_sales = $sales_row['total_sales'];
    $total_revenue_query = "SELECT SUM(Revenue) AS total_revenue FROM Destination";
    $total_revenue_result = mysqli_query($conn, $total_revenue_query);
    if (!$total_revenue_result) {
        die("Query Failed : " . mysqli_error($conn));
    }
    $total_revenue_row = mysqli_fetch_assoc($total_revenue_result);
    $total_revenue = $total_revenue_row['total_revenue'];
    // Query to count number of destinations
    $destinations_query = "SELECT COUNT(*) AS destination_count FROM Destination";
    $destinations_result = mysqli_query($conn, $destinations_query);
    if (!$destinations_result) {
        die("Query Failed : " . mysqli_error($conn));
    }
    $destinations_row = mysqli_fetch_assoc($destinations_result);
    $destination_count = $destinations_row['destination_count'];

    // Query to get top 5 clients based on spending
    $top_clients_query = "SELECT ClientName, Spending AS total_spending 
    FROM Client 
    ORDER BY Spending DESC 
    LIMIT 5;
    ";
    $top_clients_result = mysqli_query($conn, $top_clients_query);
    $top_clients_data = [];
    while ($row = mysqli_fetch_assoc($top_clients_result)) {
        $top_clients_data[$row['ClientName']] = $row['total_spending'];
    }

    //Query to get top 5 destinations
    // $top_destinations_query = "SELECT DestinationName, COUNT(BookingID) AS booking_count FROM Destination INNER JOIN Booking ON Destination.DestinationID = Booking.DestinationID GROUP BY Destination.DestinationID ORDER BY booking_count DESC LIMIT 5";
    // $top_destinations_result = mysqli_query($conn, $top_destinations_query);
    // $top_destinations_data = [];
    // while ($row = mysqli_fetch_assoc($top_destinations_result)) {
    //     $top_destinations_data[$row['DestinationName']] = $row['booking_count'];
    // }
   
    // $top_destinations_query = "SELECT DestinationName, Revenue FROM Destination ORDER BY Revenue DESC LIMIT 5";
    // $top_destinations_result = mysqli_query($conn, $top_destinations_query);
    // $top_destinations_data = [];
    // while ($row = mysqli_fetch_assoc($top_destinations_result)) {
    //     $top_destinations_data[$row['DestinationName']] = $row['Revenue'];
    // }
    $top_destinations_query = "SELECT DestinationName, Revenue FROM Destination ORDER BY Revenue DESC LIMIT 5";
$top_destinations_result = mysqli_query($conn, $top_destinations_query);
$top_destinations_data = [];
while ($row = mysqli_fetch_assoc($top_destinations_result)) {
        $revenue = floatval($row['Revenue']);
    $top_destinations_data[$row['DestinationName']] = $revenue;
}



}
?>

<main class="main-container">
    <div class="main-title">
        <h2>Welcome staff</h2>
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
                <h3>Total Sales</h3>
                <span class="material-icons-outlined">monetization_on</span>
            </div>
            <h1><?php echo htmlspecialchars($total_revenue); ?></h1>
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
            <div id="pie-chart"></div>
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

// Pie Chart for Top 5 Destinations
// Function to render pie chart for top 5 destinations
const pieChartOptions = {
    series: Object.values(topDestinationsData),
    chart: {
        type: 'pie',
        background: 'transparent',
        width: 500,
        height: 400,
    },
    labels: Object.keys(topDestinationsData),
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
    tooltip: {
        theme: 'dark',
    },
    plotOptions: {
        pie: {
            dataLabels: {
                enabled: false, // Hide data labels
            },
        },
    },
};

const pieChart = new ApexCharts(
    document.querySelector('#pie-chart'),
    pieChartOptions
);
pieChart.render();

</script>