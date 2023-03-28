<div class="container">
    <section class="row">
            <div class="col-lg-3">
                <form  action="<?php echo home_url('/'); ?>" method="get">
                    <label for="search" class="form-label">Search</label>
                    <input type="search" class="form-control" name="s" id="search" value="<?php the_search_query();?>" required/>
                    <button type="submit" class="btn btn-dark">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
    </section>
</div>



