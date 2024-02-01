        
                <div class="offcanvas offcanvas-start text-white sidebar-custom bg-black-custom shadow" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
                    <div class="offcanvas-header">
                        <h2 class="offcanvas-title title-sidebar-custom" id="offcanvasExampleLabel">Presto.it</h2>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        
                        <ul class="nav nav-pills flex-column mb-auto">
                            
                            <li class="nav-item dropdown">
                                <a class="btn btn-toggle collapsed textLinkSidebar dropdownPaddingModifier" id="buttonCategories"  data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false"> <i class="fa-solid fa-caret-right" id="categoriesIcon" ></i>  {{__('ui.categories')}}</a>
                                <div class="collapse" id="dashboard-collapse" style="">
                                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small ">
                                        
                                        @foreach($categories as $category)
                                        
                                        
                                        @if ($category != $loop->last)
                                        <li class="text-start dropdown-sidebar">
                                            <a class="categoryCustom textLinkSidebar" id="categoriesDropdown" href="{{route('showCategory', compact('category'))}}"> {{__('cat.' . $category->name)}}
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        @else
                                        <li class="text-start">
                                            <a class=" categoryCustom textLinkSidebar dropdown-sidebar" id="categoriesDropdown" href="{{route('showCategory', compact('category'))}}"> {{__('cat.' . $category->name)}}
                                            </a>
                                        </li>
                                        @endif
                                        
                                        @endforeach
                                    </ul>
                                </div>
                                
                            </li>
                            
                            <li>
                                <a href="{{route('indexAnnouncements')}}" class="nav-link textLinkSidebar pt-3 pb-3">
                                    {{__('ui.announcementsNav')}}
                                </a>
                                
                            </li>
                            {{-- <li>
                                <a href="#" class="nav-link textLinkSidebar">
                                    Cosa ci mettiamo?
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link textLinkSidebar">
                                    Cosa ci mettiamo?
                                </a>
                            </li>
                            <li>
                                <a href="#" class="nav-link textLinkSidebar">
                                    Cosa ci mettiamo?
                                </a>
                            </li> --}}
                            <li>                             
                                
                                <button class="sidebarButton">
                                    <a href="{{route('createAnnouncement')}}" class="sideBtnLink">
                                        {{__('ui.createYourAnnouncements')}}!
                                    </a>
                                </button>
                                
                            </li>
                        </ul>
                    </div>
                </div>
                