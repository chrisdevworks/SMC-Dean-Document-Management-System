<div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="general-info">
                                                                        <div class="row">
                                                                            <div class="col-lg-6">
                                                                                <table class="table">
                                                                                    <tbody>
                                                                                        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="First Name" name="firstname" value="<?php echo $row['firstname'] ?>" placeholder="First Name" required>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Middle Name" name="middlename" value="<?php echo $row['middlename'] ?>" placeholder="Middle Name" required>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-user fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Last Name" name="lastname" value="<?php echo $row['lastname'] ?>" placeholder="Last Name" required>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-venus-mars fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Gender" name="gender">
                                                                                                        <option value="Male" <?php if ($row['gender'] == "Male") echo "selected"; ?>>Male</option>
                                                                                                        <option value="Female" <?php if ($row['gender'] == "Female") echo "selected"; ?>>Female</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-id-card fa-fw"></i></i></span>
                                                                                                    </div>
                                                                                                    <input type="text" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="SMC ID" name="smc_id" value="<?php echo $row['smc_id'] ?>" placeholder="SMC ID">
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-id-card fa-fw"></i></i></span>
                                                                                                    </div>
                                                                                                    <input type="text" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="SMC ID" name="year_level" value="<?php echo $row['smc_id'] ?>" placeholder="SMC ID">
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-location-dot fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <textarea rows="1" class="form-control form-control-primary" name="paddress" placeholder="Permanent Address" data-toggle="tooltip" data-placement="top" data-original-title="Permanent Address" required=""><?php echo $row['paddress'] ?></textarea>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-person-dress fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Mother's Name" name="mother" value="<?php echo $row['mothersname'] ?>" placeholder="Mother's Name" required>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-person fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Father's Name" name="father" value="<?php echo $row['fathersname'] ?>" placeholder="Father's Name" required>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                            <div class="col-lg-6">
                                                                                <table class="table">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-cake-candles fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <input type="date" class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Birth Date" id="date" name="bday" placeholder="Birthday" value="<?php echo $row['birthdate'] ?>">
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-hand-holding-heart fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Civil Status" name="civilstat">
                                                                                                        <option value="Single" <?php if ($row['civilstatus'] == "Single") echo "selected"; ?>>Single</option>
                                                                                                        <option value="Married" <?php if ($row['civilstatus'] == "Married") echo "selected"; ?>>Married</option>
                                                                                                        <option value="Widow" <?php if ($row['civilstatus'] == "Widow") echo "selected"; ?>>Widow</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-place-of-worship fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <select class="form-control form-control-primary" data-toggle="tooltip" data-placement="top" data-original-title="Religion" name="religion">
                                                                                                        <option value="Roman Catholic" <?php if ($row['religion'] == "Roman Catholic") echo "selected"; ?>>Roman Catholic</option>
                                                                                                        <option value="Islam" <?php if ($row['religion'] == "Islam") echo "selected"; ?>>Islam</option>
                                                                                                        <option value="Seventh Day Adventist" <?php if ($row['civilstatus'] == "Seventh Day Adventist") echo "selected"; ?>>Seventh Day Adventist</option>
                                                                                                        <option value="Baptist" <?php if ($row['religion'] == "Baptist") echo "selected"; ?>>Baptist</option>
                                                                                                        <option value="Mormons" <?php if ($row['religion'] == "Mormons") echo "selected"; ?>>Mormons</option>
                                                                                                        <option value="Iglesia ni Kristo" <?php if ($row['religion'] == "Iglesia ni Kristo") echo "selected"; ?>>Iglesia ni Kristo</option>
                                                                                                        <option value="Protestant" <?php if ($row['religion'] == "Protestant") echo "selected"; ?>>Protestant</option>
                                                                                                        <option value="Born Again" <?php if ($row['religion'] == "Born Again") echo "selected"; ?>>Born Again</option>
                                                                                                        <option value="Jehova`s Witness" <?php if ($row['religion'] == "Jehova`s Witness") echo "selected"; ?>>Jehova`s Witness</option>
                                                                                                        <option value="IFI" <?php if ($row['religion'] == "IFI") echo "selected"; ?>>IFI</option>
                                                                                                        <option value="Evangelism" <?php if ($row['religion'] == "Evangelism") echo "selected"; ?>>Evangelism</option>
                                                                                                        <option value="Christian Alliance" <?php if ($row['religion'] == "Christian Alliance") echo "selected"; ?>>Christian Alliance</option>
                                                                                                        <option value="Others" <?php if ($row['religion'] == "Others") echo "selected"; ?>>Others</option>
                                                                                                    </select>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-mobile-screen fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <input type="tel" id="cphone" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Contact" name="cphone" value="<?php echo $row['contact'] ?>" placeholder="09XXXXXYYYY" pattern="[0-9]{11}" required>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-location-dot fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Parent's Address" name="pa_addr" value="<?php echo $row['parents_address'] ?>" placeholder="Parent's Address" required>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-mobile-retro fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Parents's Contact No." name="pa_cont" value="<?php echo $row['parents_contact'] ?>" placeholder="Parents's Contact No." required>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-solid fa-cake-candles fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <input type="text" class="form-control" data-toggle="tooltip" data-placement="top" data-original-title="Parents's Contact No." name="pa_cont" value="<?php echo $row['parents_contact'] ?>" placeholder="Parents's Contact No." required>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                        <tr>
                                                                                            <td>
                                                                                                <div class="input-group">
                                                                                                    <div class="input-group-prepend">
                                                                                                        <span class="input-group-text bg-primary"><i class="fa-sharp fa-solid fa-file-image fa-fw"></i></span>
                                                                                                    </div>
                                                                                                    <div class="custom-file">
                                                                                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                                                                                        <label class="custom-file-label" for="exampleInputFile">Upload Profile Picture</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-lg-12 text-right justify-content-center d-flex mb-4">
                                                                            <button class="btn btn-primary mr-2">Save</button>
                                                                            <button class="btn btn-secondary" type="button" onclick="location.href = 'index.php?page=home'">Cancel</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>