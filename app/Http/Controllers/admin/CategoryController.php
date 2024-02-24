<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::paginate(10);
       return view('admin.category.index', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $this->validate($request, [
			'thumbnail' => 'file|image|mimes:jpeg,png,jpg|max:2048',
			'name' => 'required|min:3',
		]);
            

        if ($request->hasFile('tuhmbnail')){
            $file = $request->file('thumbnail');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
        Category::create([
			'thumbnail' => $nama_file,
			'name' => $request->name,
            'slug' => Str::slug($request->name)
		]);
    
        }else{
            Category::create([
                
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
        }
		// menyimpan data file yang diupload ke variabel $file
		
	
		return redirect()->back()->with('success','Kategori baru berhasil ditambahkan');
	}
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categori   = Category::findorfail($id);
        
        return view('admin.category.edit', compact('categori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
			
			'name' => 'required|min:3',
		]);
 
        if($request->hasFile('thumbnail')){
            $file = $request->file('thumbnail');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
        // menyimpan data file yang diupload ke variabel $file
        Category::find($id)->update([
            'thumbnail' => $nama_file,   
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);
	
        }else{
            Category::find($id)->update([
                
                'name' => $request->name,
                'slug' => Str::slug($request->name)
            ]);
        }
		
		
 
		return redirect()->back()->with('success','Kategori baru berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::destroy($id);
        return  redirect()->back()->with('success','Data kategori berhasil dihapus') ;
    }
}
