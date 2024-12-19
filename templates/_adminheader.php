<header>
    <div class="logosec">
        <div class="logo">MeeToR Admin Panel</div>
    </div>
    <div class="message">
        <div class="circle"></div>
        <ion-icon class="icn" name="notifications-outline"></ion-icon>
        <div class="dropdown-center">
            <ion-icon class="icn dropdown-toggle" data-bs-toggle="dropdown" name="person-circle-outline"></ion-icon>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="https://outlook.office.com/mail/" target="_blank">Mails</a></li>
                <li><a class="dropdown-item" href="#">Account</a></li>
                <hr>
                <li>
                    <form action="log-reg.php" method="POST">
                        <input type="hidden" name="logout">
                        <button class="dropdown-item" type="submit">
                            Logout
                            <ion-icon name="log-out-outline" style="font-size: 1.2rem;"></ion-icon>
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>