public void deleteCar(int carID) {
    // Define the URL of the PHP script
    String url = "http://yourdomain.com/delete_car.php";

    // Create request queue for Volley
    RequestQueue requestQueue = Volley.newRequestQueue(this);

    // Create JSON object with the car ID
    JSONObject jsonCarID = new JSONObject();
    try {
        jsonCarID.put("carID", carID);
    } catch (JSONException e) {
        e.printStackTrace();
    }

    // Create a JSON object request
    JsonObjectRequest jsonObjectRequest = new JsonObjectRequest(Request.Method.POST, url, jsonCarID,
            new Response.Listener<JSONObject>() {
                @Override
                public void onResponse(JSONObject response) {
                    // Handle response
                    Toast.makeText(YourActivity.this, "Car deleted successfully", Toast.LENGTH_SHORT).show();
                }
            },
            new Response.ErrorListener() {
                @Override
                public void onErrorResponse(VolleyError error) {
                    // Handle error
                    Toast.makeText(YourActivity.this, "Error: " + error.getMessage(), Toast.LENGTH_SHORT).show();
                }
            });

    // Add the request to the request queue
    requestQueue.add(jsonObjectRequest);
}
