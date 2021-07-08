<?php require APPROOT . '/views/parent/inc/header.php'; ?>
<div class="main-content">
    <?php require APPROOT . '/views/parent/inc/dashnav.php'; ?>
    <link rel="stylesheet" href="<?= URLROOT ?>/css/calendar.css">

    <main>
        <div class="uid">
            <h1>Hello, <span>Guardian</span></h1><br>
            <p>Time: <?php echo date('d-m-y h:i:s'); ?></p>
        </div>

        <!-- <div>
				<p>The rest of the content is here.</p>
			</div> -->


        <section class="calendar">
            <div class="month">
                <ul>
                    <li class="prev">&#10094;</li>
                    <li class="next">&#10095;</li>
                    <li>
                        July<br>
                        <span style="font-size:18px"><?= date("Y") ?></span>
                    </li>
                </ul>
            </div>

            <ul class="weekdays">
                <li>Mo</li>
                <li>Tu</li>
                <li>We</li>
                <li>Th</li>
                <li>Fr</li>
                <li>Sa</li>
                <li>Su</li>
            </ul>

            <ul class="days">
                <li>1</li>
                <li>2</li>
                <li>3</li>
                <li>4</li>
                <li>5</li>
                <li>6</li>
                <li>7</li>
                <li>8</li>
                <li><span class="active">9</span></li>
                <li><span>10</span></li>
                <li>11</li>
                <li>12</li>
                <li>13</li>
                <li>14</li>
                <li>15</li>
                <li>16</li>
                <li>17</li>
                <li>18</li>
                <li>19</li>
                <li>20</li>
                <li>21</li>
                <li>22</li>
                <li>23</li>
                <li>24</li>
                <li>25</li>
                <li>26</li>
                <li>27</li>
                <li>28</li>
                <li>29</li>
                <li>30</li>
                <li>31</li>
                <!-- ...etc -->
            </ul>
        </section>

    </main>
</div>

<?php require APPROOT . '/views/students/inc/footer.php'; ?>