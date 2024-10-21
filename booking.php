<?php
// Allow cross-origin requests
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

// Get the raw POST data
$data = json_decode(file_get_contents("php://input"));

// Check if data is received
if (isset($data->movieTitle) && isset($data->seats) && isset($data->totalPrice) && isset($data->paymentMethod)) {
    // Here you can process the data, like saving it to a database
    // For demonstration, we just return a success response

    // Simulate storing the booking
    $response = [
        'message' => 'Booking successful',
        'booking' => [
            'movieTitle' => $data->movieTitle,
            'seats' => $data->seats,
            'totalPrice' => $data->totalPrice,
            'paymentMethod' => $data->paymentMethod,
        ]
    ];

    // Respond with JSON
    echo json_encode($response);
} else {
    // Respond with an error if the required data is not received
    http_response_code(400);
    echo json_encode(['message' => 'Invalid booking data']);
}
?>
