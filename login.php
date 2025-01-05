<?php
require 'navbar.php';
session_start();
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    
    if (empty($email) || empty($password)) {
        echo "<h2 style='color:red;'>Please enter both email and password.</h2>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<h2 style='color:red;'>Invalid email format.</h2>";
    } else {
        
        $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();

          
            if (password_verify($password, $user['password'])) {
                // Regenerate session ID
                session_regenerate_id(true);

                // Store user details in the session
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['email'] = $user['email'];

                // Redirect to dashboard
                echo "<script>
                        alert('Login successful!');
                        window.location.href = 'dashboard.php';
                      </script>";
                exit();
            } else {
                echo "<h2 style='color:red;'>Invalid password!</h2>";
            }
        } else {
            echo "<h2 style='color:red;'>No user found with that email.</h2>";
        }

        $stmt->close();
    }
}

$conn->close();
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
  
    <!-- component -->
<!-- page -->
<main
  class="mx-auto flex min-h-screen w-full items-center justify-center bg-gray-900 text-white"
>
  <!-- component -->
   <form action="login.php" method="POST">
  <section class="flex w-[30rem] flex-col space-y-10">
    <div class="text-center text-4xl font-medium">Log In</div>

    <div
      class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500"
    >
      <input
        type="text" name="email"
        placeholder="Email or Username"
        class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none"
      />
    </div>

    <div
      class="w-full transform border-b-2 bg-transparent text-lg duration-300 focus-within:border-indigo-500"
    >
      <input
        type="password" name="password"
        placeholder="Password"
        class="w-full border-none bg-transparent outline-none placeholder:italic focus:outline-none"
      />
    </div>

    <button
      class="transform rounded-sm bg-indigo-600 py-2 font-bold duration-300 hover:bg-indigo-400"
    >
      LOG IN
    </button>

    <a
      href="#"
      class="transform text-center font-semibold text-gray-500 duration-300 hover:text-gray-300"
      >FORGOT PASSWORD?</a
    >

    <p class="text-center text-lg">
      No account?
      <a
        href="./signup.php"
        class="font-medium text-indigo-500 underline-offset-4 hover:underline"
        >Create One</a
      >
    </p>
  </section>
  </form>
</main>
    
</body>
<?php
require 'footer.php';
?>
</html>