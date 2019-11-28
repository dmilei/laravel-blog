<?php

use App\Post;
use App\Category;
use App\Tag;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $author1 = User::create([
        'name' => 'John Doe',
        'email' => 'john.doe@xmail.com',
        'password' => Hash::make('password'),
        'role' => 'admin'
      ]);

      $author2 = User::create([
        'name' => 'Jane Doe',
        'email' => 'jane.doe@xmail.com',
        'password' => Hash::make('password'),
        'role' => 'admin'
      ]);

      $category1 = Category::create([
        'name' => 'News'
      ]);

      $category2 = Category::create([
        'name' => 'Updates'
      ]);

      $category3 = Category::create([
        'name' => 'Marketing'
      ]);

      $category4 = Category::create([
        'name' => 'Product'
      ]);

      $category5 = Category::create([
        'name' => 'Design'
      ]);

      $category6 = Category::create([
        'name' => 'Partnership'
      ]);

      $category7 = Category::create([
        'name' => 'Hiring'
      ]);

      $category8 = Category::create([
        'name' => 'Offers'
      ]);

      $tag1 = Tag::create([
        'name' => 'Record'
      ]);

      $tag2 = Tag::create([
        'name' => 'Customers'
      ]);

      $tag3 = Tag::create([
        'name' => 'Freebie'
      ]);

      $tag4 = Tag::create([
        'name' => 'Milestone'
      ]);

      $tag5 = Tag::create([
        'name' => 'Job'
      ]);

      $tag6 = Tag::create([
        'name' => 'Version'
      ]);

      $post1 = Post::create([
        'title' => 'We relocated our office to a new designed garage',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia.',
        'category_id' => $category1->id,
        'image' => 'posts/1.jpg',
        'user_id' => $author1->id
      ]);

      //alternatív megoldás a create
      //az authorra hívjuk meg a post create methodot
      //mivel ott is meg van a kapcsolat az author ésa  postok között, így külön nem kell megadni az author id-t
      $post2 = $author2->posts()->create([
        'title' => 'Top 5 brilliant content marketing strategies',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia.',
        'category_id' => $category3->id,
        'image' => 'posts/2.jpg'
      ]);

      $post3 = Post::create([
        'title' => 'Best practices for minimalist design with example',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia.',
        'category_id' => $category5->id,
        'image' => 'posts/3.jpg',
        'user_id' => $author1->id
      ]);

      $post4 = Post::create([
        'title' => 'Congratulate and thank to Maryam for joining our team',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia.',
        'category_id' => $category7->id,
        'image' => 'posts/4.jpg',
        'user_id' => $author1->id
      ]);

      $post5 = Post::create([
        'title' => 'New published books to read by a product designer',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia.',
        'category_id' => $category4->id,
        'image' => 'posts/5.jpg',
        'user_id' => $author2->id
      ]);

      $post6 = Post::create([
        'title' => 'This is why its time to ditch dress codes at work',
        'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia.',
        'category_id' => $category7->id,
        'image' => 'posts/6.jpg',
        'user_id' => $author1->id
      ]);

      $post1->tags()->attach([$tag4->id, $tag6->id]);
      $post2->tags()->attach([$tag1->id, $tag2->id]);
      $post3->tags()->attach([$tag3->id, $tag6->id]);
      $post4->tags()->attach([$tag4->id, $tag5->id]);
      $post5->tags()->attach([$tag2->id, $tag6->id]);
      $post6->tags()->attach([$tag4->id, $tag5->id]);

    }
}
