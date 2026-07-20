<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LinkedIn Posts</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 {
            color: #0077B5;
            text-align: center;
            margin-bottom: 30px;
        }
        .linkedin-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 20px;
        }
        .view-more {
            display: block;
            margin: 20px auto;
            background-color: #0077B5;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            text-align: center;
            font-weight: bold;
        }
        .linkedin-profile {
            width: 100%;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>LinkedIn Company Feed</h1>
        
        <div class="linkedin-container">
            <!-- LinkedIn JavaScript SDK -->
            <script src="https://platform.linkedin.com/in.js" type="text/javascript">
                lang: en_US
            </script>
            
            <!-- LinkedIn Company Profile -->
            <div class="linkedin-profile">
                <div 
                    class="linkedin-company-plugin"
                    data-id="{{ $companyId }}"
                    data-format="inline"
                    data-size="large"
                    data-type="company-profile">
                </div>
            </div>
            
            <!-- LinkedIn Company Posts -->
            <div>
                <div 
                    class="linkedin-company-plugin"
                    data-id="{{ $companyId }}"
                    data-format="inline"
                    data-posts="true"
                    data-type="company">
                </div>
            </div>
            
            <a href="{{ $companyUrl }}" class="view-more" target="_blank">
                View More on LinkedIn
            </a>
        </div>
    </div>
</body>
</html>