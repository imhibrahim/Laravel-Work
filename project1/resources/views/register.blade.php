<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="container">
        <div class="title">
            <p>Registration</p>
        </div>

        <form action="register/data" method="post">
            @csrf
            <div class="user_details">
                <div class="input_box">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" placeholder="Enter your name">
                    @error('name')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
              
                <div class="input_box">
                    <label for="email">Email</label>
                    <input type="text" name="email" placeholder="Enter your email">
                      @error('email')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="input_box">
                    <label for="phone">Phone Number</label>
                    <input type="number" name="number" placeholder="Enter your number">
                      @error('number')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
                <div class="input_box">
                    <label for="pass">Password</label>
                    <input type="password" name="pass" placeholder="Enter your password">
                      @error('pass')
                        <span style="color: red;">{{$message}}</span>
                    @enderror
                </div>
             
            </div>
          
                <div class="category">
                    <label for="">Gander :</label>
                    <label for="">Male :</label>
                    <input type="radio" value="male"  name="gander">
                      <label for="">Female :</label>
                    <input type="radio" value="female" name="gander">

                </div>
                 <div class="reg_btn">
                <input type="submit" value="Register">
            </div>
            </div>
           
        </form>
    </div>
</body>
</html>