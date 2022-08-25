  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="<?php echo base_url();?>">Home</a></li>
          <li><a href="<?php echo base_url('blog');?>">Blog</a></li>
        </ol>
        <h2 style="color:#000!important;"><?php echo $blog[0]->title;?></h2>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 entries">


            <article class="entry entry-single">

              <div class="entry-img">
                <img src="<?php echo base_url().$blog[0]->image;?>" style="width:100%;height:350px;" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="javascript:void();"><?php echo $blog[0]->title;?></a>
              </h2>

              <div class="entry-meta">
                <ul>
                  <li class="d-flex align-items-center"><i class="icofont-user"></i> <a href="javascript:void(0);">Chatresh Technologies</a></li>
                  <li class="d-flex align-items-center"><i class="icofont-wall-clock"></i> <a href="blog-single.html"><time datetime="2020-01-01"><?php echo date('M d, Y',strtotime($blog[0]->created_at));?></time></a></li>
                  <li class="d-flex align-items-center"><i class="icofont-eye-open"></i> <a href="javascript:void(0);"><?php echo $blog[0]->view;?></a></li>
                </ul>
              </div>
              <style>
                .entry-content p{
                  text-align: justify!important;
                }
              </style>
              <div class="entry-content" style="color:#000!important;">
                <p><?php echo $blog[0]->description;?>
                </p>

              </div>


            </article><!-- End blog entry -->
          </div><!-- End blog entries list -->

          <div class="col-lg-4">

            <div class="sidebar">

              <h3 class="sidebar-title">Search</h3>
              <div class="sidebar-item search-form">
                <form action="">
                  <input type="text">
                  <button type="submit"><i class="icofont-search"></i></button>
                </form>

              </div><!-- End sidebar search formn-->
              <h3 class="sidebar-title">Recent Posts</h3>
              <div class="sidebar-item recent-posts">
                <?php foreach($recent_blog as $key): ?>
                <div class="post-item clearfix">
                  <img src="<?php echo base_url($key->image)?>" alt="">
                  <h4><a href="<?php echo base_url('home/blog_info/'.$key->id);?>"><?php echo word_limiter($key->title, 8); ?></a></h4>
                  <time datetime="2020-01-01"><?php echo date('M d, Y',strtotime($key->created_at));  ?></time>
                </div>
                <?php endforeach;?>

              </div><!-- End sidebar recent posts-->

              <h3 class="sidebar-title">Tags</h3>
              <div class="sidebar-item tags">
                <ul>
                  <li><a href="#">App</a></li>
                  <li><a href="#">IT</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Business</a></li>
                  <li><a href="#">Mac</a></li>
                  <li><a href="#">Design</a></li>
                  <li><a href="#">Office</a></li>
                  <li><a href="#">Creative</a></li>
                  <li><a href="#">Studio</a></li>
                  <li><a href="#">Smart</a></li>
                  <li><a href="#">Tips</a></li>
                  <li><a href="#">Marketing</a></li>
                </ul>

              </div><!-- End sidebar tags-->

            </div><!-- End sidebar -->

          </div><!-- End blog sidebar -->

        </div>

      </div>
    </section><!-- End Blog Section -->

  </main><!-- End #main -->