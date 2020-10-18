<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Topice;
use App\Catgory;
use App\City;

$pictures = [
    'https://img.hgk891.xyz/image/esc/c346fd2231b1978707fb2b035a97c415_esc_0.jpeg',
    'https://img.hgk891.xyz/image/parse/a5fa83ae175ed527762ee3c9adb50b7e_lf_20201014020455392.jpg',
    'https://img.hgk891.xyz/image/esc/7ade2af7abe01db0374f952dbce975c8_esc_0.jpg',
    'https://img.hgk891.xyz/image/esc/f2066da3e68c97f0c019b74ba71582dc_esc_0.jpg',
    'https://img.hgk891.xyz/image/esc/846575ac1b1b651c6792dbb18ef4b49f_esc_0.jpg',
    'https://img.hgk891.xyz/image/esc/b5b5a36056bacf705168e2754254ef1b_esc_0.jpg',
    'https://img.hgk891.xyz/image/esc/e3438fdc66e5f085f849c9da7c25220f_esc_0.jpg',
    'https://img.hgk891.xyz/image/esc/a044b7b8108fbd537325af58269d01ec_esc_0.jpeg',
    'https://img.hgk891.xyz/image/esc/bf39fab19cffe3561eb527fc266b20e3_esc_2.jpeg',
    'https://img.hgk891.xyz/image/esc/9c4b90ef0ca3ecdab8939ce8b9b25f49_esc_0.jpg',
    'https://img.hgk891.xyz/image/esc/f5d3487689cd2c9d68e8f224b2ee8208_esc_0.jpeg',
    'https://img.hgk891.xyz/image/esc/86a846955f30a247e08b436771ace905_esc_1.jpg',
    'https://img.hgk891.xyz/image/parse/71c5abe330cb27ccab6f96695d3b86fe_lf_20201013114246001.jpg',
    'https://img.hgk891.xyz/image/esc/75af9a7f02bed473ed07d54565600dbf_esc_0.jpg',
    'https://img.hgk891.xyz/image/esc/578099e8f20787f3b6aca1d33e4ed5b3_esc_0.jpg',
    'https://img.hgk891.xyz/image/esc/b74b3eff00296e15bbaeb830daa0a019_esc_1.jpeg'
];
$factory->define(Topice::class,function(Faker $faker) use($pictures){
    $updated_at = $faker->dateTimeThisMonth();
    $created_at  = $faker->dateTimeThisMonth($updated_at);
    $province =  array_values(City::where('pid',1)->pluck('id','name')->toArray());
    $city = array_values(City::where('deep',2)->pluck('id','name')->toArray());
    $county = array_values(City::where('deep',3)->pluck('id','name')->toArray());
    return [
        'title' => $faker->title,
        'excerpt'   => $faker->word(3,false),
        'province'  => $faker->randomElement($province),
        'city'      => $faker->randomElement($city),
        'county'      => $faker->randomElement($county),
        'ser_project'    => $faker->sentence(),
        'contact'       => '电话:'.$faker->phoneNumber.'|微信:'.Str::random(3).rand(10,100).'|QQ:'.rand(100000,9999999),
        'consumer_price'    => '大概'.rand(100,999).'块,'.'看情况',
        'body'  => $faker->text(200),
        'user_id'   => $faker->randomElement(array_values(User::pluck('id','name')->toArray())),
        'category_id'   => $faker->randomElement([1,2,3,4,5]),
        'pictures'      => [$faker->randomElement($pictures),$faker->randomElement($pictures),$faker->randomElement($pictures)],
        'view_count'    => rand(100,999),
        'follower_count'    => rand(10,999),
        'created_at' => $created_at,
        'updated_at'    => $updated_at
    ];
});
