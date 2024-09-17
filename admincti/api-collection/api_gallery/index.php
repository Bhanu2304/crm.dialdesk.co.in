<?php $host_name = "http://crm.dialdesk.co.in/api-collection/dev/public/index.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API Gallery</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f8f9fa;
            color: #333;
        }
        h1,h5 {
            text-align: center;
            color: #007bff;
        }
        .api-section {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 40px;
            transition: transform 0.2s;
        }
        .api-section:hover {
            transform: translateY(-5px);
        }
        .section-title {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
            color: #007bff;
        }
        .section-message {
            font-size: 1em;
            margin-bottom: 20px;
            color: #6c757d;
        }
        .request-url, .json-data, .error-message, .request-data, .request-headers {
            font-family: Consolas, monospace;
            background-color: #f1f1f1;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
            word-wrap: break-word;
        }
        .json-data, .request-data, .request-headers {
            white-space: pre-wrap;
            overflow-x: auto;
        }
        .error-message {
            color: #28a745;
            background-color: #d4edda;
        }
        .request-url, .request-data, .request-headers, .json-data {
            color: #495057;
        }
        .success-message {
            color: #28a745;
            background-color: #d4edda;
            padding: 15px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .login-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-left: 1468px; /* Adjust margin for spacing */
        }
    </style>
</head>
<body>
    <h1>API Gallery</h1>
    <!-- <h5>Temp Host : 172.12.10.22/dev</h5> -->
    <a href="http://crm.dialdesk.co.in/" target="_blank" class="login-button">Login</a>
    <div id="apiGallery"></div>

    <script>
        const apiData = [
            { 
                title: 'Add User', 
                message: 'This API adds a new user.', 
                method: 'POST', 
                url: '<?php echo $host_name; ?>?api=add_user', 
                data: {"user_name": "xxxx","name":"xxxx","phone_no" : "xxxxxxxxxx"}, 
                headers: { 'X-Auth-Token': 'XXXXX' },
                successMessage: '{"code": 1402,"message": "Success","id": 100,"user": "abc1"}',
                errorMessage: '{"code": 1402,"message": "Success","id": 100,"user": "abc1"}'
            },
            { 
                title: 'Delete User', 
                message: 'This API deletes a user.', 
                method: 'POST', 
                url: '<?php echo $host_name; ?>?api=user/delete', 
                data: {"user_name": "abc1"}, 
                headers: { 'X-Auth-Token': 'XXXXX' },
                successMessage: '{"code": 1302,"message": "Success","user": "abc1","msg": "User Deleted Successfully."}',
                errorMessage: '{"code": 1302,"message": "Success","user": "abc1","msg": "User Deleted Successfully."}'
            },
            { 
                title: 'View User', 
                message: 'This API view a user.', 
                method: 'POST', 
                url: '<?php echo $host_name; ?>?api=user', 
                headers: { 'X-Auth-Token': 'XXXXX' },
                successMessage: '{"code": 1303,"message": "Success","user": [{"user_name": "xx","name": "xx","status": "Active"}]}',
                errorMessage: '{"code": 1303,"message": "Success","user": [{"user_name": "abc3","name": "test name","status": "Active"}]}'
                
            },
            { 
                title: 'Dial Call', 
                message: 'This API initiates a call.', 
                method: 'POST', 
                url: '<?php echo $host_name; ?>?api=call/dial', 
                data: {"user_name": "abc1", "phone_no": "9911362206"}, 
                headers: { 'X-Auth-Token': 'XXXXX' },
                successMessage: '{"code": "1508","msg": "Success"}',
                errorMessage: '{"code": "1508","msg": "Success"}'
            },
            { 
                title: 'Drop Call', 
                message: 'This API drops a call.', 
                method: 'POST', 
                url: '<?php echo $host_name; ?>?api=call/drop', 
                data: {"user_name": "abc1", "phone_no": "9911362206"}, 
                headers: { 'X-Auth-Token': 'XXXXX' },
                successMessage: '{"code": "1508","msg": "Success"}',
                errorMessage: '{"code": "1508","msg": "Success"}'
            },
            { 
                title: 'Click 2 Call', 
                message: 'This API click 2 call.', 
                method: 'POST', 
                url: '<?php echo $host_name; ?>?api=click2call/call', 
                data: {"user_phone_no": "xxx", "phone_no": "xxxx","campaignid":"xxxx","callnumber": "xxxxxxxxxx"}, 
                headers: { 'X-Auth-Token': 'XXXXX' },
                successMessage: '{"code": "1508","msg": "Success"}',
                errorMessage: '{"code": "1508","msg": "Success"}'
            },
            { 
                title: 'Call Log', 
                message: 'This API log a call.', 
                method: 'POST', 
                url: '<?php echo $host_name; ?>?api=call/log', 
                data: {"start-date" :"dd-mm-YYYY","end-date" :"dd-mm-YYYY"}, 
                headers: { 'X-Auth-Token': 'XXXXX' },
                successMessage: '{"call_date": "xxx","call_duration": "xxx","user": "xxx","start_time": "xxx","end_time": "xxx","url": "xxx"}',
                errorMessage: '{"call_date": "xxx","call_duration": "xxx","user": "xxx","start_time": "xxx","end_time": "xxx","url": "xxx"}'
            }
        ];

          // Sort apiData by a custom order
        apiData.sort((a, b) => {
            // Define the custom order based on titles
            const order = {
                'Add User': 1,
                'Delete User': 2,
                'Dial Call': 3,
                'Drop Call': 4,
                'Click 2 Call': 5,
                'Call Log': 6
            };

            // Compare items based on their order
            return order[a.title] - order[b.title];
        });

        const apiGallery = document.getElementById('apiGallery');

        apiData.forEach(api => {
            let fetchOptions = {
                method: api.method,
                headers: api.headers ? { ...api.headers, 'Content-Type': 'application/json' } : { 'Content-Type': 'application/json' }
            };

            if (api.method === 'POST' && api.data) {
                fetchOptions.body = JSON.stringify(api.data);
            }

            fetch(api.url, fetchOptions)
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    const apiSection = document.createElement('div');
                    apiSection.classList.add('api-section');

                    const sectionTitle = document.createElement('div');
                    sectionTitle.classList.add('section-title');
                    sectionTitle.textContent = api.title;

                    const sectionMessage = document.createElement('div');
                    sectionMessage.classList.add('section-message');
                    sectionMessage.textContent = api.message;

                    const requestUrl = document.createElement('div');
                    requestUrl.classList.add('request-url');
                    requestUrl.textContent = `Request URL: ${api.url}`;

                    const requestData = document.createElement('div');
                    requestData.classList.add('request-data');
                    requestData.textContent = `Request Data: ${api.method === 'POST' ? JSON.stringify(api.data, null, 2) : 'N/A'}`;

                    const requestHeaders = document.createElement('div');
                    requestHeaders.classList.add('request-headers');
                    requestHeaders.textContent = `Request Headers: ${JSON.stringify(fetchOptions.headers, null, 2)}`;

                    const jsonData = document.createElement('div');
                    jsonData.classList.add('json-data');
                    jsonData.textContent = JSON.stringify(data, null, 2);

                    apiSection.appendChild(sectionTitle);
                    apiSection.appendChild(sectionMessage);
                    apiSection.appendChild(requestUrl);
                    apiSection.appendChild(requestData);
                    apiSection.appendChild(requestHeaders);
                    apiSection.appendChild(jsonData);

                    // Check if there's a success message provided
                    if (api.successMessage) {
                        const successMessage = document.createElement('div');
                        successMessage.classList.add('success-message');
                        successMessage.textContent = `Success: ${api.successMessage}`;
                        apiSection.appendChild(successMessage);
                    }

                    apiGallery.appendChild(apiSection);
                })
                .catch(error => {
                    const apiSection = document.createElement('div');
                    apiSection.classList.add('api-section');

                    const sectionTitle = document.createElement('div');
                    sectionTitle.classList.add('section-title');
                    sectionTitle.textContent = api.title;

                    const sectionMessage = document.createElement('div');
                    sectionMessage.classList.add('section-message');
                    sectionMessage.textContent = api.message;

                    const requestUrl = document.createElement('div');
                    requestUrl.classList.add('request-url');
                    requestUrl.textContent = `Request URL: ${api.url}`;

                    const requestData = document.createElement('div');
                    requestData.classList.add('request-data');
                    requestData.textContent = `Request Data: ${api.method === 'POST' ? JSON.stringify(api.data, null, 2) : 'N/A'}`;

                    const requestHeaders = document.createElement('div');
                    requestHeaders.classList.add('request-headers');
                    requestHeaders.textContent = `Request Headers: ${JSON.stringify(fetchOptions.headers, null, 2)}`;

                    const errorMessage = document.createElement('div');
                    errorMessage.classList.add('error-message');
                    errorMessage.textContent = `Success: ${api.errorMessage}`;

                    apiSection.appendChild(sectionTitle);
                    apiSection.appendChild(sectionMessage);
                    apiSection.appendChild(requestUrl);
                    apiSection.appendChild(requestData);
                    apiSection.appendChild(requestHeaders);
                    apiSection.appendChild(errorMessage);

                    apiGallery.appendChild(apiSection);
                    console.error('Error fetching data:', error);
                });
        });
    </script>
</body>
</html>
