<?php 

try {
    // Get the Secret Word from DB hush hush
    $secret_word_sql = "SELECT * FROM secret_word LIMIT 1";
    $secret_word_query = $conn->query($secret_word_sql);
    $secret_word_query->setFetchMode(PDO::FETCH_ASSOC);
    $secret_word_data = $secret_word_query->fetch();
    $secret_word = $secret_word_data['secret_word'];

    // Get my data from the DB
    $interns_data_sql = "SELECT * FROM interns_data WHERE username='rayhatron'";
    $interns_data_query = $conn->query($interns_data_sql);
    $interns_data_query->setFetchMode(PDO::FETCH_ASSOC);
    $interns_data_data = $interns_data_query->fetch();
    
    $my_name = $interns_data_data['name'];
    $my_username = $interns_data_data['username'];
    $my_image = $interns_data_data['image_filename'];

} catch (PDOException $e) {

    throw $e;
}
?>
<section class="ray-container">
<style>
@import url('https://fonts.googleapis.com/css?family=Eczar');
.ray-container{
    margin: 10px 0 0 0;
}
.content-card {
    font-size: 16px;
    font-family: "Eczar", cursive;
    line-height: 1.5;
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: space-around;
    flex-wrap: wrap;
    max-width: 800px;
    width: 100%;
    margin: 0 auto;
}
.portrait {
    width: 350px;
    height: 250px;
    box-shadow: 0 2px 2px 0 rgba(0,0,0,0.14),0 1px 5px 0 rgba(0,0,0,0.12),0 3px 1px -2px rgba(0,0,0,0.2);
}
.bio {
    width: 400px;
    height: 290px;
    padding: 10px;
}
.portrait img {
    width: 100%;
    height: 100%;
}
.text-center {
    text-align: center;
}
h1{
    font-family: "Eczar", cursive;
    font-size: 2.3686rem;
    line-height: 3.375rem;
}
.giga {
    font-size: 1.7769rem;
    line-height: 2.625rem;
}
.normal {
    font-family: "Eczar", cursive;
    font-weight: normal;
    font-style: normal;
}
p {
    padding: 10px;
    margin: 0 0 1.5rem;
}
@media screen and (max-width: 960px){
    .ray-container{
        min-height: 645px;
    }
}
</style>
<article class="content-card"> 
    <article class="portrait"> 
        <img src="<?php echo $my_image; ?>" alt="<?php echo "{$my_name} ({$my_username})"; ?>" title="<?php echo "{$my_name} ({$my_username})"; ?>"> 
    </article> 
    <article class="bio"> 
        <div> 
            <h1 class="text-center">
                <div>
                    <strong>Hey!</strong>
                </div>
                <div class="normal giga">
                    <p>I'm Rayhatron, a <strong>web developer</strong> who loves to code and tackle challenges like the ones presented in the HNG Internship.</p>
                </div>
            </h1> 
        </div> 
    </article> 
</article>
</section>
<div class="normal giga text-center">
    <p>You can find out more about me on my <a href="https://rayhatron.github.io">website</a> :)</p>
</div>