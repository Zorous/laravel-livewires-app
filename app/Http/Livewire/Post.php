<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Post as Posts;

class Post extends Component
{

    //the name and description refers to the inputs

    public $posts, $name, $description, $post_id;
    public $updatePost = false;


    //Validation Rules
    protected $rules = [
        "name" => 'required',
        "description" => "required"
    ];

    protected $listeners = [
        "deletePost" => "destroy"
    ];

    public function render()
    {
        $this->posts = Posts::select('id','name','description')->get();
        return view('livewire.post');
    }

    public function resetFields(){
        $this->name = "";
        $this->description = "";
    }

    public function store(){
        //validate form request

        $this->validate();

        try{
            //create Post
            Posts::create([
                'name' =>$this->name,
                'description' =>$this->description
            ]);

            session()->flash('success','Post created Successfully!!');

        }
        catch(\Exception $e){
            //set Flash Message
            session()->flash('error',"something went wrong while creating post");

            // Reset Form fields after Creating Post
            $this->resetFields();
        }
    }


    public function edit($id){
        $post = Posts::findOrFail($id);
        $this->name = $post->name;
        $this->description = $post->description;
        $this->post_id = $post->id;
        $this->updatePost = true;
    }

    public function update(){
        $this->validate();

        try{
            //Update Post
            Posts::find($this->post_id)->fill([
                'name' => $this->name,
                'description' => $this->description,
            ])->save();

            session()->flash('success','Post updated Successfully!!');

        }
        catch(\Exception $e){
            //set Flash Message
            session()->flash('error',"something went wrong while updating post");

            // Reset Form fields after Creating Post
            $this->cancel();
        }

    }

    public function cancel(){
        $this->updatePost = false;
        $this->resetFields();
    }

    public function destroy($id){

        try{
            Posts::find($id)->delete();
            session()->flash('success','Post deleted Successfully!!');

        }
        catch(\Exception $e){
            session()->flash('error',"something went wrong while deleting post");
        }
    }
}
