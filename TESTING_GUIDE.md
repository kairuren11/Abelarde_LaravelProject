# 🎮 Complete Feature Testing Guide

## ✅ Test Each Feature Before Presentation

### **Phase 1 Features**

---

## **1. SEARCH FUNCTIONALITY** ✅

### Search by Title
- [ ] Go to Dashboard
- [ ] Type "The Witcher" in search box
- [ ] Click Search → Should show 1 game
- [ ] Clear search → Shows all games again

### Search by Developer
- [ ] Type "FromSoftware" in search box
- [ ] Click Search → Should show "Elden Ring"
- [ ] Clear search

### Search by Publisher
- [ ] Type "Nintendo" in search box
- [ ] Click Search → Should show "Zelda: Breath of the Wild"
- [ ] Clear search

### Search Combinations
- [ ] Search "Square Enix" + Filter "PlayStation 5" → Shows Final Fantasy VII Remake
- [ ] Clear filters → Resets everything

---

## **2. FILTER BY PLATFORM** ✅

### Single Platform Filter
- [ ] Select "PlayStation 5" from dropdown
- [ ] Click Search → Shows only PS5 games
- [ ] Switch to "Nintendo Switch" → Shows only Switch games
- [ ] Select "All Platforms" → Shows all games

### Combined Search & Filter
- [ ] Type "Cyberpunk" + Filter "PC"
- [ ] Click Search → Shows Cyberpunk 2077
- [ ] Type "Zelda" + Filter "PC"
- [ ] Click Search → Shows no results (Zelda is Switch only)

---

## **3. CLEAR FILTERS** ✅

### Clear All Filters
- [ ] Apply multiple search and filter criteria
- [ ] Click "Clear" button
- [ ] Verify: Search box empties, Platform dropdown resets, all games show

---

## **4. FILE UPLOAD (PHOTOS)** ✅

### Upload Photo in Add Form
- [ ] Click "Add Game" section
- [ ] Fill all required fields:
  - Title: "Test Game"
  - Release Year: "2024"
  - Developer: "Test Dev"
  - Publisher: "Test Pub"
  - Platform: Select any
- [ ] Click "Choose File" for photo
- [ ] Select JPG or PNG image
- [ ] Click "Add Game"
- [ ] Verify photo appears as avatar in table (not initials)

### Photo Validation
- [ ] Try uploading BMP file → Should show error
- [ ] Try uploading file > 2MB → Should show error
- [ ] Upload valid JPG → Should work
- [ ] Upload valid PNG → Should work

### Avatar Display
- [ ] Games with photos: Show photo thumbnail
- [ ] Games without photos: Show colored circle with initials (2 letters)
  - "Elden Ring" → "ER"
  - "The Witcher 3" → "TW"

---

## **5. EDIT WITH PHOTO** ✅

### Edit Game Without Photo
- [ ] Find a game without photo (shows initials)
- [ ] Click "Edit" button
- [ ] Modal opens with game details
- [ ] Change title to "Updated Game"
- [ ] Click "Update Game"
- [ ] Verify changes saved, initials updated

### Edit Game Add Photo
- [ ] Find a game without photo
- [ ] Click "Edit"
- [ ] Upload a new photo in edit modal
- [ ] Click "Update Game"
- [ ] Verify photo now shows in table instead of initials

### Edit Game Replace Photo
- [ ] Find a game with photo
- [ ] Click "Edit"
- [ ] Upload a different photo
- [ ] Click "Update Game"
- [ ] Verify new photo shows (old photo should be deleted)

---

## **Phase 2 Features**

---

## **6. SOFT DELETE** ✅

### Delete Without Permanent Removal
- [ ] Click "Delete" on any game
- [ ] Confirm in dialog
- [ ] Game disappears from main table
- [ ] Game is NOT permanently removed
- [ ] Verify game is in trash (see below)

### Confirmation Dialog
- [ ] Click "Delete" on "Minecraft"
- [ ] Dialog asks "This will move the game to trash. Continue?"
- [ ] Click "Cancel" → Game stays in table
- [ ] Click "Delete" again → Game moves to trash

---

## **7. TRASH PAGE** ✅

### Access Trash
- [ ] Click "🗑️ Trash" button
- [ ] Should show at least 4 deleted games (seeded data)
- [ ] Shows same photo/initials as main table
- [ ] Back button to return to dashboard

### Verify Database Has Trash
- [ ] Delete 1-2 games from main view
- [ ] Go to Trash
- [ ] Should now see 5-6+ games (4 seeded + newly deleted)

---

## **8. RESTORE FUNCTIONALITY** ✅

### Restore Single Game
- [ ] Go to Trash page
- [ ] Click "Restore" on "Anthem" (seeded game)
- [ ] Click "Restore" in confirmation dialog
- [ ] Page shows "Game restored successfully!"
- [ ] Go back to Dashboard
- [ ] "Anthem" now appears in main table

### Restore Recently Deleted Game
- [ ] Go to main dashboard
- [ ] Delete "Fortnite"
- [ ] Go to Trash
- [ ] "Fortnite" is there
- [ ] Click "Restore"
- [ ] Verify it returns to dashboard

---

## **9. PERMANENT DELETE** ✅

### Permanently Delete from Trash
- [ ] Go to Trash page
- [ ] Click "Delete Forever" on "Concord" (seeded game)
- [ ] Confirm: "Permanently delete this game? This cannot be undone!"
- [ ] Game is completely removed
- [ ] Cannot restore it anymore
- [ ] Count of trashed games decreases

### Verify Permanent Deletion
- [ ] Permanently delete a game
- [ ] Go to main dashboard
- [ ] Game doesn't exist anywhere
- [ ] Go back to trash
- [ ] Game is gone from trash too

---

## **10. PDF EXPORT** ✅

### Basic Export
- [ ] Go to Dashboard
- [ ] Click "📄 Export PDF" button
- [ ] File downloads automatically
- [ ] Filename format: `games_export_YYYY-MM-DD_HH-MM-SS.pdf`
  - Example: `games_export_2026-01-22_14-30-45.pdf`

### PDF Content Verification
- [ ] Open downloaded PDF
- [ ] Contains table with columns:
  - #, Title, Developer, Publisher, Release Year, Platform
- [ ] Shows all 12 active games
- [ ] Footer shows: "Total Records: 12"
- [ ] Page layout: Landscape

### Export with Search Filter
- [ ] Search "Cyberpunk"
- [ ] Click "📄 Export PDF"
- [ ] Download and open PDF
- [ ] Should only contain Cyberpunk 2077
- [ ] Header shows filtered results

### Export with Platform Filter
- [ ] Filter by "Nintendo Switch"
- [ ] Click "📄 Export PDF"
- [ ] Download and open PDF
- [ ] Should only show Switch games (Zelda, Hollow Knight, Stardew Valley, Hades)

### Export with Combined Filters
- [ ] Search "game" + Filter "PC"
- [ ] Click "📄 Export PDF"
- [ ] PDF shows only matching games

---

## **11. RESPONSIVE DESIGN** ✅

### Desktop View (1200px+)
- [ ] All columns visible in table
- [ ] Forms display side-by-side
- [ ] Search bar is wide enough
- [ ] No horizontal scroll needed

### Tablet View (768px)
- [ ] Open Chrome DevTools (F12)
- [ ] Set width to 768px
- [ ] Table is readable with scroll if needed
- [ ] Forms stack nicely
- [ ] Buttons are touchable

### Mobile View (375px)
- [ ] Set width to 375px
- [ ] Table has horizontal scroll
- [ ] Forms stack vertically
- [ ] Search bar takes full width
- [ ] All buttons accessible
- [ ] Photo avatars visible

### Test on Real Mobile
- [ ] Access application from phone
- [ ] All features work on mobile
- [ ] Touch inputs work smoothly
- [ ] Photos load correctly

---

## **ADDITIONAL TESTS**

---

## **12. FORM VALIDATION** ✅

### Required Fields
- [ ] Try adding game without title → Error message
- [ ] Try adding game without developer → Error message
- [ ] Try adding game without platform → Error message

### Field Length
- [ ] Try title with > 255 characters → Error
- [ ] Try release year with > 4 characters → Error
- [ ] Try entering letters in release_year → Works or shows error

### Photo Validation
- [ ] Try uploading file > 2MB → "Image size must not exceed 2048 kilobytes"
- [ ] Try uploading .gif → "Only JPG/PNG allowed"
- [ ] Try uploading .tiff → "Only JPG/PNG allowed"

---

## **13. STATISTICS CARDS** ✅

### Total Games Count
- [ ] Should show 12 (after seeding)
- [ ] Should update when you add/delete games
- [ ] Counts only active games (not trashed)

### Active Platforms Count
- [ ] Should show 5 (PlayStation 5, Xbox, Nintendo Switch, PC, Steam Deck)
- [ ] Should not change when games are deleted

### Games with Photo Count
- [ ] Should increase when you upload photos
- [ ] Counts only games with photos (not initials)
- [ ] Updates in real-time

---

## **14. DATABASE RELATIONSHIPS** ✅

### Game-Platform Relationship
- [ ] Each game shows correct platform
- [ ] Filter by platform shows correct games
- [ ] Delete platform → cascades or sets null
- [ ] Edit platform name → updates in all games

### Data Persistence
- [ ] Add game → Persists after refresh
- [ ] Edit game → Changes persist
- [ ] Delete game → Gone from main, in trash
- [ ] Restore game → Returns to main

---

## **15. ERROR HANDLING** ✅

### Try Invalid Routes
- [ ] Go to `/games/invalid` → 404 or redirect
- [ ] Try accessing trash without auth → Redirect to login

### Session Management
- [ ] Logout and try accessing `/games` → Redirect to login
- [ ] Messages persist after redirect

---

## **FINAL CHECKLIST BEFORE PRESENTATION**

```
[ ] Database has exactly 12 active games
[ ] Database has exactly 4 trashed games (Anthem, No Man's Sky, Fallout 76, Concord)
[ ] Database has 5 platforms created
[ ] At least 5 games have photos uploaded
[ ] Search works: title, developer, publisher
[ ] Filter works: by platform
[ ] Clear filters works
[ ] Add game form works with validation
[ ] Edit game works with photo replacement
[ ] Delete moves to trash (soft delete)
[ ] Trash page shows all deleted games
[ ] Restore brings games back from trash
[ ] Delete Forever permanently removes games
[ ] PDF export works and respects filters
[ ] PDF filenames have timestamps
[ ] Responsive design works on all screen sizes
[ ] All error messages display correctly
[ ] No console errors (F12 → Console)
[ ] No broken images or styling issues
[ ] All buttons work without double-clicking
[ ] Forms submit without page refresh (where applicable)
[ ] Session timeout handled gracefully
```

---

## 🎯 Test Results Template

| Feature | Status | Notes |
|---------|--------|-------|
| Search by Title | ✅ | Works perfectly |
| Search by Developer | ✅ | Works perfectly |
| Search by Publisher | ✅ | Works perfectly |
| Filter by Platform | ✅ | All platforms filter correctly |
| Clear Filters | ✅ | Resets all inputs |
| Photo Upload | ✅ | Validates format & size |
| Photo Display | ✅ | Shows avatar or initials |
| Edit with Photo | ✅ | Replaces old photo |
| Soft Delete | ✅ | Game moves to trash |
| Trash Page | ✅ | Shows all deleted games |
| Restore | ✅ | Returns game to main table |
| Permanent Delete | ✅ | Removes forever |
| PDF Export | ✅ | Downloads with timestamp |
| PDF Filtering | ✅ | Respects search/filter |
| Responsive Mobile | ✅ | Works on 375px |
| Responsive Tablet | ✅ | Works on 768px |
| Responsive Desktop | ✅ | Works on 1200px+ |
| Validation | ✅ | All rules enforced |
| Statistics | ✅ | Counts accurate |
| Session Auth | ✅ | Protected routes work |

---

## 📝 Notes

- All tests should pass without any console errors
- Test in both Chrome and Firefox if possible
- Clear browser cache (Ctrl+Shift+Delete) before each test
- Close and reopen browser between major features
- Keep database backed up in case you need to reset

---

**Good luck! Test everything multiple times before your demonstration! 🎉**
