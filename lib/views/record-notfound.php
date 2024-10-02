  <?php
  /**
 * View: Record Not Found
 *
 * Displays a not found error message to the candidate.
 *
 * @package YourPackageName
 * @subpackage Views
 */

  // Ensure $description is set and not empty
  if (!isset($description) || empty($description)) {
      $description = 'The requested record was not found.';
  }
  ?>

  <div class="error-container">
      <style>
          .error-container {
              max-width: 600px;
              margin: 50px auto;
              text-align: center;
              font-family: Arial, sans-serif;
              background-color: #f8f8f8;
              border-radius: 8px;
              padding: 30px;
              box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
          }
          h1 {
              color: #e74c3c;
              font-size: 28px;
              margin-bottom: 20px;
          }
          p {
              color: #555;
              font-size: 16px;
              line-height: 1.6;
              margin-bottom: 30px;
          }
          .button {
              display: inline-block;
              background-color: #3498db;
              color: #fff;
              text-decoration: none;
              padding: 10px 20px;
              border-radius: 5px;
              transition: background-color 0.3s ease;
          }
          .button:hover {
              background-color: #2980b9;
          }
      </style>
      <h1>Record Not Found</h1>
      <p><?php echo $description; ?></p>
      <a href="/" class="button">Return to Home</a>
  </div>
