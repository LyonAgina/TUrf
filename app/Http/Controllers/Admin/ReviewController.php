<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
class ReviewController extends Controller {
    public function index(Request $request) {
        $query = Review::query();
        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('user_id', 'like', "%$search%")
                  ->orWhere('rating', 'like', "%$search%")
                  ->orWhere('comment', 'like', "%$search%");
            });
        }
        $reviews = $query->get();
        return view('admin.reviews.index', compact('reviews'));
    }
    public function create() { return view('admin.reviews.create'); }
    public function store(Request $request) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);
        Review::create($validated);
        return redirect()->route('admin.reviews.index')->with('success', 'Review created successfully.');
    }
    public function show(Review $review) { return view('admin.reviews.show', compact('review')); }
    public function edit(Review $review) { return view('admin.reviews.edit', compact('review')); }
    public function update(Request $request, Review $review) {
        $validated = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);
        $review->update($validated);
        return redirect()->route('admin.reviews.index')->with('success', 'Review updated successfully.');
    }
    public function destroy(Review $review) {
        $review->delete();
        return redirect()->route('admin.reviews.index')->with('success', 'Review deleted successfully.');
    }
}
