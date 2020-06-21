@extends('website.parent')

@section('content')
    <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <!-- Slide One - Set the background image for this slide in the line below -->
                <div class="carousel-item active" style="background-image: url({{asset('website/img/s.jpg')}})">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Bayern</h3>
                     </div>
                </div>
                <!-- Slide Two - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url({{asset('website/img/b.jpg')}})">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Real Madred</h3>
                     </div>
                </div>
                <!-- Slide Three - Set the background image for this slide in the line below -->
                <div class="carousel-item" style="background-image: url({{asset('website/img/d.jpg')}})">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>Barshalona</h3>
                     </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </header>
    <!-- Page Content -->
    <section>
        <div class="container">

            <h3 class="my-4">last news about kora</h3>

            <!-- Marketing Icons Section -->
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <h4 class="card-header">Kora Title</h4>
                        <div class="card-body">
                            <p class="card-text">Barcelona intends to solve the crisis in the closed rooms Press reports revealed that Barcelona intends to solve the crisis of Nelson Simido in closed doors, after breaking the quarantine.

                                Simedo had celebrated his birthday with more than 20 people inside a restaurant in Barcelona, ​​where he underwent Corona tests and was isolated from the team.</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <h4 class="card-header">Kora Title</h4>
                        <div class="card-body">
                            <p class="card-text">Zinedine Zidane, Real Madrid and Spain coach, made an important decision regarding the team's training, before Eibar was confronted with the eloquence.

                                Zidane decided to go into training at the same time as the match against Ibar at Di Stefano Stadium,.</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 mb-4">
                    <div class="card h-100">
                        <h4 class="card-header">Kora Title</h4>
                        <div class="card-body">
                            <p class="card-text">Manchester United are close to signing the Bayern Munich midfielder, the French player, "Corentin Tolisso" during the next summer transfer market.

                                Bayern Munich club determined the marketing value of the contract with "Tolisu", which amounted to 31 million euros, to approve the departure of the Bavarian midfielder to Manchester United.</p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
    </section>
    <section class="gray-sec">
        <div class="container">
            <!-- category Section -->
            <h3 class="my-4">Leagues

            </h3>

            <div class="row">
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{asset('website/img/q.jpg')}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">European League
                                </a>
                            </h4>
                            <p class="card-text">The European League or European League or, as previously known, the European Union Cup is a European club football competition established in 1971 by the European Football Association. It is the second mos
                                t important European club football championship after the Champions League.</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{asset('website/img/e.jpg')}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Egyptian League
                                </a>
                            </h4>
                            <p class="card-text">he Egyptian Premier League is the highest-level football league championship in Egypt, and is one of the strongest and oldest football tournaments in the Middle East and Africa. The first edition was held in 1948, and Al-Ahly won the most crowning title so far, crowning 41 times, followed by Zamalek who won the league 12 times, followed by Ismaili 3 times, and won
                                the league title once: Arsenal, Olympic, Ghazl Al-Mahalla and Arab Contractors.</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{asset('website/img/w.jpg')}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Gulf League
                                </a>
                            </h4>
                            <p class="card-text">The Arab Gulf League is the highest football club competition in the Unite
                                d Arab Emirates. The first team to win the title Sharjah is the current champion of the league for the season 19-19, while Al Ain holds the record for achiev
                                ing the title 13 times. Fourteen teams compete in the ups and downs with the UAE League 1</p>
                        </div>

                    </div>
                </div>

            </div>
         </div>
    </section>
    <section >
        <div class="container">

            <h3 class="my-4">Various sports
            </h3>
            <div class="row">

                <div class="col-lg-3  portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{asset('website/img/l.jpg')}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Basketball</a>
                            </h4>
                            <p class="card-text">Several players have expressed reluctance to resume the NBA in late July, due to family and community reasons and fears of an infection of the new Coronavirus, which has suspended com
                                petition since March, according to the ISBN sports network Thursday.</p>
                        </div>


                    </div>
                </div>

                <div class="col-lg-3  portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{asset('website/img/k.jpg')}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Tennis</a>
                            </h4>
                            <p class="card-text">Serbian Novak Djokovic, the world number one tennis player, express
                                ed his doubts about the establishment of the American Open, the finals of the Grand Slam (Grand Slam), due
                                to be held until now from August 31 to
                                September 13 next, because of the health demands against Corona outbreak emerging..</p>
                        </div>


                    </div>
                </div>
                <div class="col-lg-3  portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{asset('website/img/FnNjb.jpg')}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Volleyball</a>
                            </h4>
                            <p class="card-text">Volleyball is one of the most popular sports worldwide. T
                                wo teams play, separated by a high net. the team needs to hit the ball above
                                the net over to the opposing team. Each team has three chances to hit the ball above the net. A poin
                                t is calculated for the team when the ball hits the opponent's ground, or if a mistake is made,
                                or if the team fails to block the ball and return it correctly.</p>
                        </div>

                    </div>
                </div>
                <div class="col-lg-3  portfolio-item">
                    <div class="card h-100">
                        <a href="#"><img class="card-img-top" src="{{asset('website/img/y.jpg')}}" alt=""></a>
                        <div class="card-body">
                            <h4 class="card-title">
                                <a href="#">Football</a>
                            </h4>
                            <p class="card-text">Football is a team sport played between two team
                                s of eleven players, playing a ball. Football is played by 250 million playe
                                rs in more than two hundred countries around the world, so it is the most popular and
                                widespread sport in the world. Football is played on a rectangular court with two goals on its sides. Th
                                e goal of the game is to score goals by kicking the ball into the goal.</p>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /.row -->
             <br>
            <br>
        </div>
    </section>
     <section>
        <div class="container">
            <!--  Section -->
            <div class="row">
                <div class="col-lg-6">
                    <h3>Billiardo</h3>

                    <p>Billiard is a variety of games that play with a stick to hit balls and move them on a table with some holes in them.
                        It is very difficult to determine the inventor of billiards, as the history of the game is very complex.
                        It suffices to mention that both the French, the English and the Germans claim to invent it. There are even some myths that send them back to China generations before they appeared in Europe. The difficulty in determining the creators of the game is also withdrawn from the time period in which it appeared, even though the odds are due to its emergence in the fifteenth and sixteenth century,
                        despite some voices that come back to the fifth century BC</p>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid rounded full-width" src="{{asset('website\img\I.jpg')}}" alt="" style="">
                </div>
            </div>
            <!-- /.row -->

            <hr>

            <!-- Call to Action Section -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <p>contact with us :</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-secondary btn-block" href="{{route('website.contact')}}">contact us</a>
                </div>
            </div>
        </div>
        <!-- /.container -->

    </section>
@endsection
