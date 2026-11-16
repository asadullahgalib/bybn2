<!--================= Students Admission Section Start Here ================= -->
<div class="students-section pt---100 pb---100" style="background-image: url('{{ asset('uploads/admission_images/'.@$admission->image)}}') !important;">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="students-inner" style="padding: 120px 0px;">
                    <div class="contents">
                        <p>Admission</p>
                        <h1 class="student-section-title" style="font-size: 45px;font-weight: 600;line-height: 65px;">{{@$admission->description}}</h1>
                        <a target="_blank" href="{{@$admission->url}}" class="btn btn-info more-about" style="color: #fff;"> Apply For Admission <i class="fa fa-arrow-right"></i> &nbsp;</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--================= Students Admission Section End Here ================= -->