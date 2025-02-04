# Number Classification API

## Description
This API classifies a given number based on its mathematical properties and provides a fun fact using the Numbers API.

## API Endpoint
### Request
**Method:** `GET`  
**URL:**  
```
<your-domain>/api/classify-number?number=<integer>
```

### Example Request
```
GET https://yourdomain.com/api/classify-number?number=371
```

### Response (200 OK)
```json
{
    "number": 371,
    "is_prime": false,
    "is_perfect": false,
    "properties": ["armstrong", "odd"],
    "digit_sum": 11,
    "fun_fact": "371 is an Armstrong number because 3^3 + 7^3 + 1^3 = 371"
}
```

### Response (400 Bad Request)
```json
{
    "number": "invalid_input",
    "error": true
}
```

## Setup Instructions
1. **Clone the Repository**  
   ```bash
   git clone https://github.com/yourusername/number-classification-api.git
   cd number-classification-api
   ```
2. **Run Locally with XAMPP**  
   - Place the project in the `htdocs` folder.  
   - Start Apache from XAMPP Control Panel.  
   - Access the API in a browser or Postman:
     ```
     http://localhost/number-classification-api/classify-number.php?number=371
     ```

## Deployment
Deploy the API to a public hosting platform such as:
- [Vercel](https://vercel.com/)
- [Railway](https://railway.app/)
- [InfinityFree](https://infinityfree.net/)

## Technologies Used
- **PHP** (Backend)
- **Numbers API** (Fun facts)
- **XAMPP** (Local server)

## Backlink
[Hire PHP Developers](https://hng.tech/hire/php-developers)

