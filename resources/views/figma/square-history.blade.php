<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <!--<meta name=description content="This site was generated with Anima. www.animaapp.com"/>-->
    <!-- <link rel="shortcut icon" type=image/png href="https://animaproject.s3.amazonaws.com/home/favicon.png" /> -->
    <meta name="viewport" content="width=1600, maximum-scale=1.0" />
    <link rel="shortcut icon" type="image/png" href="https://animaproject.s3.amazonaws.com/home/favicon.png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <meta name="og:type" content="website" />
    <meta name="twitter:card" content="photo" />
    <link rel="stylesheet" type="text/css" href="figma/css/frame-1.css" />
    <link rel="stylesheet" type="text/css" href="figma/css/styleguide.css" />
    <link rel="stylesheet" type="text/css" href="figma/css/globals.css" />
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

  </head>
  <body style="margin: 0; background: #ffffff">
    <input type="hidden" id="anPageName" name="page" value="frame-1" />
    <div class="container-center-horizontal">
      <div class="frame-1 screen">
        <div class="top-header">
          <div class="overlap-group9">
            <div class="txt_-logo"><span>JALE</span></div>

                <div class="txt_-dashboard poppins-normal-gravel-14px">
                    <a href="{{route('dashboard')}}" class="logo logo-light">
                        <div class="btn btn-sm">
                            <span class="poppins-normal-gravel-14px">
                                {{__('Dashboard')}}
                            </span>
                        </div>
                    </a>
                </div>



            <div class="txt_-job-search poppins-normal-gravel-14px">
              <span class="poppins-normal-gravel-14px">{{__('Job Search')}}</span>
            </div>
            <div class="overlap-group">
              <img class="oval-3" src="figma/img/oval-3-1@2x.png" alt="Oval 3" />
              <img class="rectangle-267" src="figma/img/rectangle-267-1@2x.png" alt="Rectangle 267" />
              <div class="notification-alert"></div>
              <img class="rectangle-87" src="figma/img/rectangle-87-1@2x.png" alt="Rectangle 87" />
            </div>
            <img class="img_-profile" src="figma/img/img-profile@2x.png" alt="img_Profile" />
            <div class="user_-name"><span>Austin Robertson</span></div>
            <img class="icon_sign_out" src="figma/img/icon-sign-out-1@2x.png" alt="icon_sign_out" />
          </div>
        </div>
        <div class="overlap-group10">
          <div class="job-search-white-bar"></div>
          <div class="navbar">
            <div class="ic_-search">
              <img class="combined-shape" src="figma/img/combined-shape-3@2x.png" alt="Combined Shape" />
            </div>
            <div class="navbar-link-txt_-job-title roboto-normal-bombay-16px">
                <input type="text"
                        class="redondeado confondo sinborde roboto-normal-bombay-16px"
                        name=""
                        id=""
                        placeholder="{{__('Job Title, Company')}}"
                >
            </div>
            <div class="icon_-job-location"></div>
            <div class="navbar-link-txt_-job-location roboto-normal-bombay-16px">
                <input type="text"
                        class="redondeado confondo sinborde roboto-normal-bombay-16px"
                        name=""
                        id=""
                        placeholder="{{__('Location')}}"
                >
            </div>
            <div class="group-25"></div>
            <div class="navbar-link-txt_-job-type roboto-normal-bombay-16px">
                <input type="text"
                        class="redondeado confondo sinborde roboto-normal-bombay-16px"
                        name=""
                        id=""
                        placeholder="{{__('Job Type')}}"
                >
            </div>
            <div class="icon_-salary"></div>
            <div class="navbar-link-txt_-job-salary roboto-normal-bombay-16px">
              <input type="text"
                        class="redondeado confondo sinborde roboto-normal-bombay-16px"
                        name=""
                        id=""
                        placeholder="{{__('Salary Range')}}"
                >
            </div>
            <div class="btn_-search-blue">
                <div class="overlap-group-1">
                    <div class="txt_-search poppins-semi-bold-white-16px">
                        <div class="btn btn-primary">
                            {{__('Search')}}
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
        <div class="overlap-group11">
          <div class="txt_-search-results"><span>{{__('Search results')}}</span></div>
          <div class="overlap-group7">
            <div class="var_job-container">
              <div class="var_-job-post-days"><span>{{__('2 Days ago')}}</span></div>
              <div class="var_-job_-title"><span>{{__('Principal UX Designer')}}</span></div>
            </div>
            <div class="var_-job-company"><span>{{__('Tokopedia')}}</span></div>
            <div class="var_-job-location roboto-normal-gravel-14px">
              <span class="roboto-normal-gravel-14px">{{__('Jakarta, Indonesia')}}</span>
            </div>
            <div class="overlap-group-container">
              <div class="overlap-group6">
                <div class="var_-job-type poppins-medium-nevada-10px">
                  <span class="poppins-medium-nevada-10px">{{__('Full Time')}}</span>
                </div>
              </div>
              <div class="overlap-group5">
                <div class="var_-job-salary poppins-medium-nevada-10px">
                  <span class="poppins-medium-nevada-10px">{{__('$20/hr')}}</span>
                </div>
              </div>
              <div class="overlap-group4">
                <div class="var_-job-shift poppins-medium-nevada-10px">
                  <span class="poppins-medium-nevada-10px">{{__('Morning')}}</span>
                </div>
              </div>
              <div class="overlap-group3">
                <div class="var_-job-spanish poppins-medium-nevada-10px">
                  <span class="poppins-medium-nevada-10px">{{__('Español')}}</span>
                </div>
              </div>
              <div class="overlap-group2">
                <div class="var_-job-english poppins-medium-nevada-10px">
                  <span class="poppins-medium-nevada-10px">{{__('English')}}</span>
                </div>
              </div>
            </div>
            <div class="txt_-job-description"><span>{{__('Job Description')}}</span></div>
            <p class="var_-job-description roboto-normal-gravel-14px">
              <span class="roboto-normal-gravel-14px"
                >We are looking for a principal UX designer to work with the team of developers for a technology
                company. We are looking for highly motivated individuals that are able to perform well under presssure.
                We offer many benefits, including 2 week paid vacations, health insurance, flexible hours, winter bonus,
                etc.</span
              >
            </p>
            <div class="overlap-group-container-1">
                <div class="overlap-group-2 btn btn-lg">
                    <div class="btn_-aplicar poppins-semi-bold-white-16px">

                        {{__('Apply')}}

                    </div>
                </div>

                <div class="overlap-group1">
                    <div class="poppins-semi-bold-white-16px btn btn-lg w-full">
                        {{__('Add to Favorites')}}
                    </div>
                </div>
                <input id="chkToggle2" type="checkbox" checked>
                <script>
                  $(function(){ $('#chkToggle2').bootstrapToggle() });
                </script>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container-f">
        <form class="needs-validation" novalidate>
            <div class="form-row">
              <div class="col-md-4 mb-3">
                <label for="validationCustom01">First name</label>
                <input type="text" class="form-control" id="validationCustom01" placeholder="First name" value="Mark" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationCustom02">Last name</label>
                <input type="text" class="form-control" id="validationCustom02" placeholder="Last name" value="Otto" required>
                <div class="valid-feedback">
                  Looks good!
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <label for="validationCustomUsername">Username</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                  </div>
                  <input type="text" class="form-control" id="validationCustomUsername" placeholder="Username" aria-describedby="inputGroupPrepend" required>
                  <div class="invalid-feedback">
                    Please choose a username.
                  </div>
                </div>
              </div>
            </div>
            <div class="form-row">
              <div class="col-md-6 mb-3">
                <label for="validationCustom03">City</label>
                <input type="text" class="form-control" id="validationCustom03" placeholder="City" required>
                <div class="invalid-feedback">
                  Please provide a valid city.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationCustom04">State</label>
                <input type="text" class="form-control" id="validationCustom04" placeholder="State" required>
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>
              <div class="col-md-3 mb-3">
                <label for="validationCustom05">Zip</label>
                <input type="text" class="form-control" id="validationCustom05" placeholder="Zip" required>
                <div class="invalid-feedback">
                  Please provide a valid zip.
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>
            </div>
            <button class="btn btn-primary" type="submit">Submit form</button>
          </form>

          <script>
          // Example starter JavaScript for disabling form submissions if there are invalid fields
          (function() {
            'use strict';
            window.addEventListener('load', function() {
              // Fetch all the forms we want to apply custom Bootstrap validation styles to
              var forms = document.getElementsByClassName('needs-validation');
              // Loop over them and prevent submission
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                  form.classList.add('was-validated');
                }, false);
              });
            }, false);
          })();
          </script>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

  </body>
</html>
