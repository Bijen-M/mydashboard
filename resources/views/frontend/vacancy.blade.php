@extends('frontend.layouts.master')
@section('content')

@include('frontend.layouts.common.breadcrumbs')
<main>
    <section class="project_content">
      <div class="container-fluid">
        <div class="row">
          <div class="col* col-md-6 col-lg-6 card_mid">
            <div class="accordion" id="carrerAccordion">
                @foreach ($vacancies as $index => $vacancy)
                    
                
              <div class="accordion-item">
                <h2 class="accordion-header" id="carrerOne">
                  <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#tab{{$index}}" aria-expanded="true" aria-controls="tab{{$index}}">
                    {{ucwords($vacancy->title)}}
                  </button>
                </h2>
                <div id="tab{{$index}}" class="accordion-collapse collapse show" aria-labelledby="carrerOne" data-bs-parent="#carrerAccordion">
                  <div class="accordion-body">
                    <div class="carrer_infos">
                      <div class="carrer_infos_list">
                        <h5>{{$vacancy->subtitle}}: </h5>
                        <ul>
                        @foreach (explode(',', $vacancy->description) as $description)
                            <li>{{ str_replace(['"', '[', ']' ,'\\'], '', $description) }}</li>
                        @endforeach
                         
                          {{-- <li>Should have more than 5 years of working experience in construction equipment.</li>
                          <li>Ability and willingness to work in team & to work under pressure in remote area.</li> --}}
                        </ul>
                      </div>

                      {{-- <div class="carrer_infos_list">
                        <h5>Job Description: </h5>
                        <ul>
                          <li>Analysis of monthly losses on account of mechanical failure, interruption, malfunction and efficiency.</li>
                          <li>Perform breakdown analysis of equipment.</li>
                          <li>Take preventive and corrective actions for controlling non conformity of services.</li>
                          <li> Ensure availability of standby equipment and spare parts if needed.</li>
                          <li>Make reports when required.</li>
                          <li>Work in coordination with engineers.</li>
                        </ul>
                      </div> --}}
                    </div>
                  </div>
                </div>
              </div>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
@endsection

@section('footer_resources')
<script type="text/javascript" src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/main.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/custom.js')}}"></script>
@endsection