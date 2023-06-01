# Drupal Resume Builder Application with Custom Modules

The Drupal Resume Builder Application is designed to assist users in creating resumes. The application consists of two custom modules:

**resumeMaker**:
The "resumeMaker" module enables users to input their resume details. Upon submission, the module automatically redirects the user to the "/generate" page. A custom ID is generated and mapped to the user details, which are stored in the database.

<img width="861" alt="/app page" src="https://github.com/Shyam16102001/Modules-for-Resume-Builder/assets/55325014/7b01f7d6-f0d5-4b1a-99d3-5d267f8927b6">

**generate**:
The "generate" module is responsible for displaying the resume details based on the custom ID passed through the URL. It retrieves the corresponding user details from the database and presents them in a resume format.

<img width="861" alt="/generate" src="https://github.com/Shyam16102001/Modules-for-Resume-Builder/assets/55325014/0fc0e03e-5a9d-47dc-86bc-feef82eb9850">
